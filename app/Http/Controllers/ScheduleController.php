<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
use App\Repositories\ScheduleRepository;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    protected $scheduleRepository;

    public function __construct()
    {
        $this->scheduleRepository = app(ScheduleRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ScheduleResource::collection($this->scheduleRepository->list());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ScheduleResource
     */
    public function store(Request $request)
    {
        $json = json_encode($request->get('json'), JSON_UNESCAPED_UNICODE);

        return ScheduleResource::make($this->scheduleRepository->create(['start_date' => $request->start_date, 'end_date' => $request->end_date, 'json' => $json, 'group_id' => $request->group_id]));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(int $id)
    {
        return ScheduleResource::collection($this->scheduleRepository->getGroup($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ScheduleResource
     */
    public function update(Request $request, $id)
    {
        return ScheduleResource::make($this->scheduleRepository->update($request->all(), $this->scheduleRepository->get($id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->scheduleRepository->delete($id);
    }
}
