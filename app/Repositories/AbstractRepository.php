<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AbstractRepository implements RepositoryInterface
{

    protected $class;
    protected $model;

    public function __construct()
    {
        $this->model = clone app($this->getModelClass());
    }

    public function getModelClass()
    {
        return $this->class;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function get(int $id): ?Model
    {
        return $this->model::find($id);
    }

    /**
     * @param array $data
     * @return Model|null
     */
    public function create(array $data): ?Model
    {
        return $this->model::create($data);
    }

    /**
     * @param array $data
     * @param Model $model
     * @return Model|null
     */
    public function update(array $data, Model $model): ?Model
    {
        $model->fill($data)->save();
        return $model;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model::destroy($id);
    }

    /**
     * @return array
     */
    public function list(): Collection
    {
        return $this->model::all();
    }

}
