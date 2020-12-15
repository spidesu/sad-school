<?php

namespace App\Http\Controllers;

use App\Actions\App\Student\SheetFormAction;
use App\Http\Resources\SheetResource;
use App\Repositories\SheetRepository;
use Illuminate\Http\Request;

class SheetController extends Controller
{

    protected $sheetRepository;
    protected $sheetAction;
    public function __construct()
    {
        $this->sheetRepository = app(SheetRepository::class);
        $this->sheetAction = app(SheetFormAction::class);
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
     * @return SheetResource
     */
    public function store(Request $request)
    {
        return SheetResource::make($this->sheetRepository->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        return $this->sheetRepository->delete($id);
    }

    public function form()
    {
        return $this->sheetAction->getFormVars();
    }

}
