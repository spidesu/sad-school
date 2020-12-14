<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'course_id'];


    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getStudentCountAttribute()
    {
        $count = 0;
        foreach ($this->groups as $group)
        {
            $count += $group->studentCount;
        }

        return $count;
    }

    public function getTeacherCountAttribute()
    {
        $count = 0;
        foreach ($this->groups as $group)
        {
            $count += $group->teacherCount;
        }

        return $count;
    }
}
