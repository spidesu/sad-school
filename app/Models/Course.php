<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'program_id', 'code', 'adaptive'];

    public function specializations()
    {
        return $this->hasMany(Specialization::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function getStudentCountAttribute()
    {
        $count = 0;
        foreach ($this->specializations as $specialization)
        {
            $count+=$specialization->studentCount;
        }

        return $count;
    }

    public function getTeacherCountAttribute()
    {
        $count = 0;
        foreach ($this->specializations as $specialization)
        {
            $count += $specialization->teacherCount;
        }

        return $count;
    }
}
