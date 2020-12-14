<?php


namespace App\Actions\App\Student;


use App\Repositories\DisabilityRepository;
use App\Repositories\EducationRepository;
use App\Repositories\GenderRepository;

class TeacherFormAction
{
    protected $genderRepository;
    protected $disabilityRepository;
    protected $educationRepository;


    public function __construct()
    {
        $this->genderRepository = app(GenderRepository::class);
        $this->disabilityRepository = app(DisabilityRepository::class);
        $this->educationRepository = app(EducationRepository::class);
    }

    public function getFormVars()
    {
        $res = [];
        $res['genders'] = $this->genderRepository->list();
        $res['disabilities'] = $this->disabilityRepository->list();
        $res['educations'] = $this->educationRepository->list();
        return $res;
    }

}
