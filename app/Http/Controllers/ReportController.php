<?php

namespace App\Http\Controllers;

use App\Repositories\DepartmentRepository;
use App\Repositories\GroupRepository;
use App\Repositories\ProgramRepository;
use App\Repositories\SpecializationRepository;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class ReportController extends Controller
{
    protected $studentRepository;
    protected $teacherRepository;
    protected $programRepository;
    protected $departmentRepository;
    protected $specRepository;
    protected $groupRepository;

    public function __construct()
    {
        $this->studentRepository = app(StudentRepository::class);
        $this->teacherRepository = app(TeacherRepository::class);
        $this->programRepository = app(ProgramRepository::class);
        $this->departmentRepository = app(DepartmentRepository::class);
        $this->specRepository = app(SpecializationRepository::class);
        $this->groupRepository = app(GroupRepository::class);
    }

    public function getPersonalIssue(int $student_id)
    {
        $student = $this->studentRepository->get($student_id);
        $data =
            [
                'full_name' => $student->last_name . ' ' . $student->first_name . ' ' . $student->middle_name,
                'birth_date' => date('d.m.Y', strtotime($student->birth_date)),
                'address_act' => $student->address_act,
                'created_at' => date('d.m.Y', strtotime($student->created_at)),
//                'program' => $student->group->course->program->name,
            'representatives' => $student->representatives,
            'program' => $this->studentRepository->getProgram($student_id)
        ];
        $pdf = PDF::loadView('pdf.student', $data);
        return $pdf->download('student.pdf');
    }

    public function getTeacher(int $teacher_id)
    {
        $teacher = $this->teacherRepository->get($teacher_id);
        $groups = $teacher->groups->map(function ($v) {return $v->name;});
        $data =
            [
                'full_name' => $teacher->last_name . ' ' . $teacher->first_name . ' ' . $teacher->middle_name,
                'birth_date' => date('d.m.Y', strtotime($teacher->birth_date)),
                'status' => $teacher->status ? $teacher->status->name : 'Неизвестно',
                'position' => $teacher->position ? $teacher->position->name : 'Неизвестно',
                'education' => $teacher->education ? $teacher->education->name : 'Неизвестно',
                'specialization' => $teacher->specialization ? $teacher->specialization->name : 'Неизвестно',
                'begin_at' => date('d.m.Y', strtotime($teacher->begin_at)),
                'parttime_work' => $teacher->parttime_work ? 'Нет' : 'Да',
                'working_rate' => $teacher->working_rate,
                'groups' => implode(', ', $groups->toArray()),
        ];
        $pdf = PDF::loadView('pdf.teacher', $data);
        return $pdf->download('teacher.pdf');
    }

    public function cadrReport()
    {
        $teachers = $this->specRepository->countTeacher();
       // dd($teachers);
        $data['result'] = $teachers;
        $pdf = PDF::loadView('pdf.cadrReport', $data)->setPaper('a4', 'landscape');
        return $pdf->download('cadrReport.pdf');
    }

    public function testReport()
    {
        $student = $this->studentRepository->reportList();
        $teacher = $this->teacherRepository->reportList();
        $departments = $this->departmentRepository->listWithProgram();
        $nonBudgetPrograms = $this->programRepository->nonBudgetList();
        $countBudget = $departments->map(function ($item) {
            $result = [];
            $result['name'] = $item->name;
            $result['count'] = $item->studentCount;
            foreach ($item->programs as $program) {
                if ($program->educational_form_id == 1) {
                    $result['programs'][] = ['name' => $program->name, 'count' => $program->studentCount];
                }
            }
            return $result;
        });



//        $countNonBudget = $departments->map(function ($item) {
//            $result = [];
//            $result['name'] = $item->name;
//            $result['count'] = $item->studentCount;
//            foreach ($item->programs as $program) {
//                if ($program->educational_form_id == 2)
//                {
//                    $result['programs'][] = ['name' => $program->name, 'count' => $program->studentCount];
//                }
//            }
//            return $result;
//        });
        $data = ['current_date' => date('d.m.Y'), 'student' => $student, 'teacher' => $teacher, 'budgetPrograms' => $countBudget, 'nonBudgetPrograms' => $nonBudgetPrograms];
        $pdf = PDF::loadView('pdf.fullReport', $data);
        return $pdf->download('report.pdf');
    }

    public function sheetReport(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');
        dd($request->html);
        $pdf->loadHTML($request->html)->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }

    public function groupReport()
    {
        $data['groups'] = $this->groupRepository->list();
        $pdf= PDF::loadView('pdf.group', $data);
        return $pdf->download('groups.pdf');
    }
}
