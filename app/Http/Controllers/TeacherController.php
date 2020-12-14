<?php

namespace App\Http\Controllers;

use App\Actions\App\Student\TeacherFormAction;
use App\Http\Resources\DicResource;
use App\Http\Resources\StudentDicResource;
use App\Http\Resources\TeacherResource;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    protected $teacherAction;
    protected $teacherRepository;

    public function __construct()
    {
        $this->teacherAction = app(TeacherFormAction::class);
        $this->teacherRepository = app(TeacherRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TeacherResource::collection($this->teacherRepository->list());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return TeacherResource
     */
    public function store(Request $request)
    {
        return TeacherResource::make($this->teacherRepository->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TeacherResource
     */
    public function show($id)
    {
        return TeacherResource::make($this->teacherRepository->get($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return TeacherResource
     */
    public function update(Request $request, $id)
    {
        return TeacherResource::make($this->teacherRepository->update($request->all(), $this->teacherRepository->get($id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->teacherRepository->delete($id);
    }

    public function dictionary()
    {
        return StudentDicResource::collection($this->teacherRepository->list());
    }

    public function form()
    {
        $res = $this->teacherAction->getFormVars();
        return [
            'disabilities' => DicResource::collection($res['disabilities']),
            'genders' => DicResource::collection($res['genders']),
            'educations' => DicResource::collection($res['educations'])
        ];
    }
}
