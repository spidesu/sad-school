<?php


namespace App\Repositories;


use App\Models\Specialization;

class SpecializationRepository extends AbstractRepository
{
    protected $class = Specialization::class;

    public function courseList($course_id)
    {
        return $this->model->where(['course_id' => $course_id])->get();
    }

    public function cadrReport()
    {
        return $this->model->with(['course.program.department', 'groups', 'groups.teachers'])->get()->groupBy('course.program.department.name')

            ->transform(function($item, $k) {
                return $item->groupBy('');});
    }

    public function countTeacher()
    {
        $result = $this->model->selectRaw('count(*) as count, specializations.id as spec_id, specializations.name, educations.id as edu_id, teachers.specialization_id as tspec_id')
            ->leftJoin('groups', 'groups.specialization_id', '=', 'specializations.id')
            ->join('courses', 'courses.id', '=', 'specializations.course_id')
            ->join('programs', 'programs.id', '=', 'courses.program_id')
            ->leftJoin('group_teacher', 'groups.id', '=', 'group_teacher.group_id')
            ->join('teachers', 'group_teacher.teacher_id', '=', 'teachers.id')
            ->leftJoin('educations', 'educations.id', '=', 'teachers.education_id')
            ->groupBy('specializations.id', 'specializations.name','educations.id', 'teachers.specialization_id')
            ->get()
            ->groupBy('name')->transform(function($item, $k) {
                return $item->groupBy('edu_id');})->toArray();
        array_walk($result,function (&$v) {
            $count_high = 0;
            $count_low = 0;
            $count_this_high = 0;
            $count_this_low = 0;
            foreach ($v as $value)
            {

                foreach($value as $end)
                {
                if ($end['tspec_id'] === $end['spec_id'] && $end['edu_id'] == 2)
                {
                    $count_this_high += $end['count'];
                } elseif ($end['tspec_id'] === $end['spec_id'] && $end['edu_id'] == 1)
                {
                    $count_this_low += $end['count'];
                } elseif ($end['tspec_id'] != $end['spec_id'] && $end['edu_id'] == 1)
                {
                    $count_low += $end['count'];
                }else
                {
                    $count_high += $end['count'];
                }
                }
                $v['count_this_high'] = $count_this_high;
                $v['count_this_low'] = $count_this_low;
                $v['count_high'] = $count_high;
                $v['count_low'] = $count_low;
            }
        });

       // dd($result);


        return $result;
    }



}
