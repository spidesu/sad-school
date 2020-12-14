<?php


namespace App\Repositories;



use App\Models\Group;
use FontLib\TrueType\Collection;

class GroupRepository extends AbstractRepository
{
    protected $class = Group::class;


    public function search(string $searchQuery) :Collection
    {
        return $this->model::where('name', 'like', $searchQuery)->get();
    }
}
