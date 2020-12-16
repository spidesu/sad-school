<?php


namespace App\Actions\App\Student;


use App\Repositories\DisabilityRepository;
use App\Repositories\EducationRepository;
use App\Repositories\GenderRepository;
use App\Repositories\SpecializationRepository;

class TeacherFormAction
{
    protected $genderRepository;
    protected $disabilityRepository;
    protected $educationRepository;
    protected $specRepository;


    public function __construct()
    {
        $this->genderRepository = app(GenderRepository::class);
        $this->disabilityRepository = app(DisabilityRepository::class);
        $this->educationRepository = app(EducationRepository::class);
        $this->specRepository = app(SpecializationRepository::class);
    }

    public function getFormVars()
    {
        $res = [];
        $res['genders'] = $this->genderRepository->list();
        $res['disabilities'] = $this->disabilityRepository->list();
        $res['educations'] = $this->educationRepository->list();
        $res['specializations'] = $this->specRepository->list();
        return $res;
    }

}
