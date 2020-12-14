<?php

namespace App\Http\Controllers;

use App\Http\Resources\RepresentativeDicResource;
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
     * @return RepresentativeDicResource
     */
    public function store(Request $request)
    {
        return RepresentativeDicResource::make($this->representativeRepository->create($request->all()));
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
