<?php


namespace App\Actions\App\Student;


use App\Repositories\ProgramRepository;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;

class ReportAction
{

    protected $studentRepository;
    protected $teacherRepository;
    protected $programRepository;

    public function __construct()
    {
        $this->studentRepository = app(StudentRepository::class);
        $this->teacherRepository = app(TeacherRepository::class);
        $this->programRepository = app(ProgramRepository::class);
    }

    public function generateReport()
    {
        $students = [];
        $students = $this->studentRepository->reportList();
        $teachers = $this->teacherRepository->list();
        $programs = $this->programRepository->list();



    }

}
