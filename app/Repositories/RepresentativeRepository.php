<?php


namespace App\Repositories;


use App\Models\Representative;

class RepresentativeRepository extends AbstractRepository
{

    protected $class = Representative::class;

    public function findRep($query)
    {
        return $this->model->where('last_name', 'like', $query . '%')->get();
    }

}
