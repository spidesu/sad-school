<?php


namespace App\Actions\App\Student;


use App\Repositories\DisabilityRepository;
use App\Repositories\GenderRepository;
use App\Repositories\GroupRepository;
use App\Repositories\HealthGroupRepository;

class StudentFormAction
{
    protected $groupRepository;
    protected $genderRepository;
    protected $healthGroupRepository;
    protected $disabilityRepository;


    public function __construct()
    {
        //$this->studentRepository = app(StudentRepository::class);
        //$this->representativeRepository = app(RepresentativeRepository::class);
        $this->groupRepository = app(GroupRepository::class);
        $this->genderRepository = app(GenderRepository::class);
        $this->healthGroupRepository = app(HealthGroupRepository::class);
        $this->disabilityRepository = app(DisabilityRepository::class);
    }

    public function getFormVars()
    {
        $res = [];
        $res['groups'] = $this->groupRepository->list();
        $res['genders'] = $this->genderRepository->list();
        $res['healthGroups'] = $this->healthGroupRepository->list();
        $res['disabilities'] = $this->disabilityRepository->list();

        return $res;
    }

}
