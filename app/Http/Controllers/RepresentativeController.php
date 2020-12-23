<?php

namespace App\Http\Controllers;

use App\Http\Resources\RepresentativeDicResource;
use App\Http\Resources\RepresentativeResource;
use App\Http\Resources\StudentDicResource;
use App\Repositories\RepresentativeRepository;
use Illuminate\Http\Request;

class RepresentativeController extends Controller
{

    protected $representativeRepository;
    public function __construct()
    {
        $this->representativeRepository = app(RepresentativeRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RepresentativeResource::collection($this->representativeRepository->list());
    }

    public function findRep(Request $request)
    {
        return StudentDicResource::collection($this->representativeRepository->findRep($request->q));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RepresentativeResource
     */
    public function store(Request $request)
    {
        return RepresentativeResource::make($this->representativeRepository->create($request->all()));
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
        //
    }
}
