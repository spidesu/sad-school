<?php


namespace App\Actions\App\Student;


use App\Repositories\DisabilityRepository;
use App\Repositories\EducationRepository;
use App\Repositories\GenderRepository;
use App\Repositories\PositionRepository;
use App\Repositories\SpecializationRepository;
use App\Repositories\TeacherStatusRepository;

class TeacherFormAction
{
    protected $genderRepository;
    protected $disabilityRepository;
    protected $educationRepository;
    protected $specRepository;
    protected $teacherStatusRepository;
    protected $positionRepository;


    public function __construct()
    {
        $this->genderRepository = app(GenderRepository::class);
        $this->disabilityRepository = app(DisabilityRepository::class);
        $this->educationRepository = app(EducationRepository::class);
        $this->specRepository = app(SpecializationRepository::class);
        $this->positionRepository = app(PositionRepository::class);
        $this->teacherStatusRepository = app(TeacherStatusRepository::class);
    }

    public function getFormVars()
    {
        $res = [];
        $res['genders'] = $this->genderRepository->list();
        $res['disabilities'] = $this->disabilityRepository->list();
        $res['educations'] = $this->educationRepository->list();
        $res['specializations'] = $this->specRepository->list();
        $res['positions'] = $this->positionRepository->list();
        $res['statuses'] = $this->teacherStatusRepository->list();
        return $res;
    }

}
