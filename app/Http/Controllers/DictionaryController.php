<?php

namespace App\Http\Controllers;

use App\Http\Resources\DicResource;
use App\Repositories\DisabilityRepository;
use App\Repositories\EducationRepository;
use App\Repositories\GenderRepository;
use App\Repositories\HealthGroupRepository;
use App\Repositories\SubjectRepository;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{

    protected $genderRepository;
    protected $educationRepository;
    protected $healthGroupRepository;
    protected $disabilityRepository;
    protected $subjectRepository;

    public function __construct()
    {
        $this->genderRepository = app(GenderRepository::class);
        $this->educationRepository = app(EducationRepository::class);
        $this->healthGroupRepository = app(HealthGroupRepository::class);
        $this->disabilityRepository = app(DisabilityRepository::class);
        $this->subjectRepository = app(SubjectRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return [
            'disabilities' => DicResource::collection($this->disabilityRepository->list()),
            'genders' => DicResource::collection($this->genderRepository->list()),
            'health_groups' => DicResource::collection($this->healthGroupRepository->list()),
            'education' => DicResource::collection($this->educationRepository->list()),
            'subjects' => DicResource::collection($this->subjectRepository->list()),
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return DicResource
     */
    public function store(Request $request)
    {
        $dic = $request->dic_id . 'Repository';
        return DicResource::make($this->$dic->create(['name' => $request->name]));
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
    public function destroy($dic_id,$item_id)
    {
        $dic = $dic_id . 'Repository';
        return $this->$dic->delete($item_id);
    }
}
