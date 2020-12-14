<?php


namespace App\Repositories;


use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;

class ScheduleRepository extends AbstractRepository
{
    protected $class = Schedule::class;

    /**
     * @param array $data
     * @return Model|null
     */
    public function create(array $data): ?Model
    {
        return $this->model::create($data);
    }

    public function getGroup($id)
    {
        return $this->model->where(['group_id' => $id])->get();
    }

}
