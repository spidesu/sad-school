<?php


namespace App\Repositories;


use App\Models\Program;

class ProgramRepository extends AbstractRepository
{

    protected $class = Program::class;

    public function nonBudgetList()
    {
        return $this->model->where(['educational_form_id' => 2])->with('department')->get();
    }

    public function budgetList()
    {
        return $this->model->where(['educational_form_id' => 1])->with('department')->get()->groupBy('department.id');
    }

}
