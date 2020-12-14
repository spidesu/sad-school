<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartmentResource;
use App\Http\Resources\DepartmentWithProgramResource;
use App\Http\Resources\DicResource;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentRepository;

    public function __construct()
    {
        $this->departmentRepository = app(DepartmentRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return DepartmentWithProgramResource::collection($this->departmentRepository->list());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return DicResource
     */
    public function store(Request $request)
    {
        return DicResource::make($this->departmentRepository->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return DepartmentResource
     */
    public function show($id)
    {
        return DepartmentResource::make($this->departmentRepository->get($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return DepartmentResource
     */
    public function update(Request $request, $id)
    {
        return DepartmentResource::make($this->departmentRepository->update($request->all(), $this->departmentRepository->get($id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->departmentRepository->delete($id);
    }
}
