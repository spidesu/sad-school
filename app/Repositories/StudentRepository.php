<?php


namespace App\Repositories;


use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentRepository extends AbstractRepository
{
    protected $class = Student::class;


    public function create(array $data) : ?Model
    {
        $model = $this->model::create($data);

        isset($data['representative_ids']) ? $model->representatives()->attach($data['representative_ids']) : null;
        return $model;
    }

    public function update(array $data, Model $model) : ?Model
    {
        $model->fill($data)->save();
        $model->representatives()->sync($data['representative_ids']);
        return $model;
    }

    public function getProgram($student_id)
{
    return $this->model->select('programs.name')
        ->leftJoin('group_student', 'group_student.student_id', '=', 'students.id')
        ->leftJoin('groups', 'group_student.group_id', '=', 'groups.id')
        ->leftJoin('specializations', 'specializations.id', '=', 'groups.specialization_id')
        ->leftJoin('courses', 'courses.id','=', 'specializations.course_id')
        ->leftJoin('programs', 'programs.id', '=', 'courses.program_id')
        ->where(['students.id' => $student_id])
        ->first();
}

    public function reportList()
    {
        $student = [];
        $student['count'] = $this->model->count();
        $student['count_very_low'] = $this->model->whereRaw('TIMESTAMPDIFF(YEAR,CURDATE(), birth_date)BETWEEN 3 AND 7')->count();
        $student['count_low'] = $this->model->whereRaw('TIMESTAMPDIFF(YEAR,CURDATE(), birth_date)BETWEEN 7 AND 11')->count();
        $student['count_medium'] = $this->model->whereRaw('TIMESTAMPDIFF(YEAR,CURDATE(), birth_date)BETWEEN 11 AND 15')->count();
        $student['count_high'] = $this->model->whereRaw('TIMESTAMPDIFF(YEAR,CURDATE(), birth_date)BETWEEN 15 AND 7')->count();
        $student['count_non_budget'] = $this->model
            ->leftJoin('group_student', 'group_student.student_id', '=', 'students.id')
            ->leftJoin('groups', 'group_student.group_id', '=', 'groups.id')
            ->leftJoin('specializations', 'specializations.id', '=', 'groups.specialization_id')
            ->leftJoin('courses', 'courses.id','=', 'specializations.course_id')
            ->leftJoin('programs', 'programs.id', '=', 'courses.program_id')
            ->where(['programs.educational_form_id' => 2])->count();
        $student['count_low_money'] =  $this->model->where('low_money', '=', 1)->count();
        $student['count_migrant'] =  $this->model->where('migrant', '=', 1)->count();
        $student['count_disability'] =  $this->model->whereNotNull('disability_id')->count();
        $student['count_no_reps'] =  $this->model->where('no_reps', '=', 1)->count();
        $student['count_special'] = $student['count_low_money'] + $student['count_migrant'] + $student['count_disability'] + $student['count_no_reps'] ;
        $student['count_2x'] = $this->model->select('students.id', DB::raw('count(*) as total'))->leftJoin('group_student', 'students.id', '=', 'group_student.student_id')->
        leftJoin('groups', 'group_student.group_id', '=', 'groups.id')->groupBy('students.id')->get()->filter(function($model) {
            if ($model->total >=2) return $model;
        })->count();
        return $student;
    }

    public function sheetList($student_id)
    {
        $student = $this->model->find($student_id);
//        return $student->sheets()->get();
        return $student->sheets()->get()->groupBy('subject.name')->transform(function($item, $k) {
            return $item->groupBy('year')->transform(function($item, $k) {
                return $item->groupBy('quarter_id');
            });
        });
    }

}
