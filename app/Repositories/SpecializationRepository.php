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

}
