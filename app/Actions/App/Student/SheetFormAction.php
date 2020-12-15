<?php


namespace App\Actions\App\Student;


use App\Repositories\DisabilityRepository;
use App\Repositories\GenderRepository;
use App\Repositories\GroupRepository;
use App\Repositories\HealthGroupRepository;
use App\Repositories\QuarterRepository;
use App\Repositories\RepresentativeRepository;
use App\Repositories\SubjectRepository;

class SheetFormAction
{
    protected $subjectRepository;
    protected $quarterRepository;


    public function __construct()
    {
        //$this->studentRepository = app(StudentRepository::class);
        //$this->representativeRepository = app(RepresentativeRepository::class);
        $this->subjectRepository = app(SubjectRepository::class);
        $this->quarterRepository = app(QuarterRepository::class);
    }

    public function getFormVars()
    {
        $res = [];
        $res['quarters'] = $this->quarterRepository->list();
        $res['subjects'] = $this->subjectRepository->list();

        return $res;
    }

}
