<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgramResource;
use App\Repositories\ProgramRepository;
use Illuminate\Http\Request;

class ProgramController extends Controller
{

    protected $programRepository;

    public function __construct()
    {
        $this->programRepository = app(ProgramRepository::class);
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
     * @return ProgramResource
     */
    public function store(Request $request)
    {
        return ProgramResource::make($this->programRepository->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ProgramResource
     */
    public function show($id)
    {
        return ProgramResource::make($this->programRepository->get($id));
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
