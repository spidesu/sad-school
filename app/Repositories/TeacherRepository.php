<?php


namespace App\Repositories;


use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class TeacherRepository extends AbstractRepository
{

    protected $class = Teacher::class;

    public function reportList()
    {

        $teacher = [];
        $teacher['count'] = $this->model->count();
        $teacher['count_groupped'] = $this->model->leftJoin('educations', 'teachers.education_id', '=', 'educations.id')->select('educations.name', 'edu_teach', DB::raw('count(*) as total'))->groupBy('educations.name', 'edu_teach')->get();
        $teacher['count_low_exp'] = $this->model->whereRaw('TIMESTAMPDIFF(YEAR,CURDATE(), work_since) <= 5')->count();
        $teacher['count_high_exp'] = $this->model->whereRaw('TIMESTAMPDIFF(YEAR,CURDATE(), work_since) >= 30')->count();
        $teacher['count_low_years'] = $this->model->whereRaw('TIMESTAMPDIFF(YEAR,CURDATE(), birth_date) <= 30')->count();
        $teacher['count_high_years'] = $this->model->whereRaw('TIMESTAMPDIFF(YEAR,CURDATE(), work_since) >= 55')->count();

        return $teacher;
    }

}
