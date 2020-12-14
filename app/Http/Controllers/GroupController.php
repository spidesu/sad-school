<?php

namespace App\Http\Controllers;

use App\Http\Resources\DicResource;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use App\Models\Student;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    protected $groupRepository;

    public function __construct()
    {
        $this->groupRepository = app(GroupRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return GroupResource::collection($this->groupRepository->list());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return GroupResource
     */
    public function store(Request $request)
    {
        return GroupResource::make($this->groupRepository->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return GroupResource
     */
    public function show($id)
    {
        return GroupResource::make($this->groupRepository->get($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return GroupResource
     */
    public function update(Request $request, $id)
    {
        return GroupResource::make($this->groupRepository->update($request->all(), $this->groupRepository->get($id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->groupRepository->delete($id);
    }

    public function search(Request $request)
    {
        return GroupResource::collection($this->groupRepository->search($request['searchQuery']));
    }

    public function addStudent(Request $request)
    {
        $group = Group::find($request->group_id);
        $group->students()->sync($request->student_id, false);
        return GroupResource::make($this->groupRepository->get($request->group_id));
    }

    public function addTeacher(Request $request)
    {
        $group = Group::find($request->group_id);
        $group->teachers()->sync($request->teacher_id, false);
        return GroupResource::make($this->groupRepository->get($request->group_id));
    }

    public function deleteStudent(Request $request)
    {
        $group = Group::find($request->group_id);
        $group->students()->detach($request->student_id);
        return GroupResource::make($this->groupRepository->get($request->group_id));
    }

    public function deleteTeacher(Request $request)
    {
        $group = Group::find($request->group_id);
        $group->teachers()->detach($request->teacher_id);
        return GroupResource::make($this->groupRepository->get($request->group_id));
    }

    public function dictionary()
    {
        return DicResource::collection($this->groupRepository->list());
    }
}
