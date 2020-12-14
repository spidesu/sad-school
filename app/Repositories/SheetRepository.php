<?php


namespace App\Repositories;


use App\Models\Sheet;

class SheetRepository extends AbstractRepository
{

    protected $class = Sheet::class;

    protected $studentRepository;

    public function __construct()
    {
        $this->studentRepository = app(StudentRepository::class);
    }



}
