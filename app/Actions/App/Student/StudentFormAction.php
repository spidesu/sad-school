<?php


namespace App\Actions\App\Student;


use App\Repositories\DisabilityRepository;
use App\Repositories\EndRepository;
use App\Repositories\GenderRepository;
use App\Repositories\GroupRepository;
use App\Repositories\HealthGroupRepository;
use App\Repositories\RepresentativeRepository;
use App\Repositories\StudentStatusRepository;

class StudentFormAction
{
    protected $groupRepository;
    protected $genderRepository;
    protected $healthGroupRepository;
    protected $disabilityRepository;
    protected $repRepository;
    protected $studentStatusRepository;
    protected $endRepository;


    public function __construct()
    {
        //$this->studentRepository = app(StudentRepository::class);
        //$this->representativeRepository = app(RepresentativeRepository::class);
        $this->groupRepository = app(GroupRepository::class);
        $this->genderRepository = app(GenderRepository::class);
        $this->healthGroupRepository = app(HealthGroupRepository::class);
        $this->disabilityRepository = app(DisabilityRepository::class);
        $this->repRepository = app(RepresentativeRepository::class);
        $this->studentStatusRepository = app(StudentStatusRepository::class);
        $this->endRepository = app(EndRepository::class);
    }

    public function getFormVars()
    {
        $res = [];
        $res['groups'] = $this->groupRepository->list();
        $res['genders'] = $this->genderRepository->list();
        $res['healthGroups'] = $this->healthGroupRepository->list();
        $res['representatives'] = $this->repRepository->list();
        $res['disabilities'] = $this->disabilityRepository->list();
        $res['statuses'] = $this->studentStatusRepository->list();
        $res['ends'] = $this->endRepository->list();
        return $res;
    }

}
