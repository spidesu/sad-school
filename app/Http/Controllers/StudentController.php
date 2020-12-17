<?php

namespace App\Http\Controllers;

use App\Actions\App\Student\StudentFormAction;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\DicResource;
use App\Http\Resources\SheetResource;
use App\Http\Resources\StudentDicResource;
use App\Http\Resources\StudentResource;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentRepository;
    protected $studentAction;

    public function __construct()
    {
        parent::__construct();
        $this->studentRepository = app(StudentRepository::class);
        $this->studentAction = app(StudentFormAction::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return StudentResource::collection($this->studentRepository->list());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentRequest $request
     * @return StudentResource
     */
    public function store(StudentRequest $request)
    {
        return StudentResource::make($this->studentRepository->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return StudentResource
     */
    public function show(int $id)
    {
        return StudentResource::make($this->studentRepository->get($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentRequest $request
     * @param int $id
     * @return StudentResource
     */
    public function update(StudentRequest $request, int $id)
    {
        return StudentResource::make($this->studentRepository->update($request->all(), $this->studentRepository->get($id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id)
    {
        return $this->studentRepository->delete($id);
    }

    public function dictionary()
    {
        return StudentDicResource::collection($this->studentRepository->list());
    }

    public function sheet($student_id)
    {
        return ['sheets' => $this->studentRepository->sheetList($student_id),
            'student' => StudentResource::make($this->studentRepository->get($student_id))];
    }

    public function form()
    {
        $res = $this->studentAction->getFormVars();
        return [
            'groups' => DicResource::collection($res['groups']),
            'healthGroups' => DicResource::collection($res['healthGroups']),
            'genders' => DicResource::collection($res['genders']),
            'disabilities' => DicResource::collection($res['disabilities']),
            'representatives' => StudentDicResource::collection($res['representatives']),
            'statuses' => DicResource::collection($res['statuses']),
            'ends' => DicResource::collection($res['ends'])
        ];
    }
}
