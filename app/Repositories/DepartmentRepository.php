<?php


namespace App\Repositories;


use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentRepository extends AbstractRepository
{
    public $class = Department::class;

    public function reportList()
    {
        return $this->model->with('programs')->select('program.name', DB::raw('count(*) as total'))->groupBy('programs.id')->get();
    }

    public function listWithProgram()
    {
        return $this->model->with('programs')->get();
    }


    public function budgetList()
    {
        return $this->model->with('programs')->get();
    }

}
