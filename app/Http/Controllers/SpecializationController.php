<?php

namespace App\Http\Controllers;

use App\Http\Resources\DicResource;
use App\Http\Resources\SpecizaliationResource;
use Illuminate\Http\Request;
use App\Repositories\SpecializationRepository;
class SpecializationController extends Controller
{

    protected $specRepository;

    public function __construct()
    {
        $this->specRepository = app(SpecializationRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return SpecizaliationResource
     */
    public function store(Request $request)
    {
        return SpecizaliationResource::make($this->specRepository->create($request->all()));
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
        return $this->specRepository->delete($id);
    }

    public function dictionary($course_id)
    {
        return DicResource::collection($this->specRepository->courseList($course_id));
    }
}
