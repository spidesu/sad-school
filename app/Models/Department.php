<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $hidden = [];
    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function getStudentCountAttribute()
    {
        $count = 0;

        foreach ($this->programs as $program)
        {
            $count+= $program->studentCount;
        }

        return $count;
    }

    public function getTeacherCountAttribute()
    {
        $count = 0;
        foreach ($this->programs as $program)
        {
            $count += $program->teacherCount;
        }

        return $count;
    }
}
