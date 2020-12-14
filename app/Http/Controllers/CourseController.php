<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Http\Resources\DicResource;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    protected $courseRepository;

    public function __construct()
    {
        $this->courseRepository = app(CourseRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CourseResource
     */
    public function store(Request $request)
    {
        return CourseResource::make($this->courseRepository->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->courseRepository->delete($id);
    }

    public function dictionary()
    {
        return DicResource::collection($this->courseRepository->list());
    }
}
