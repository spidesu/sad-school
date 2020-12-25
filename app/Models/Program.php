<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'department_id', 'educational_form_id'];
    protected $hidden = [];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function educationalForm()
    {
        return $this->belongsTo(EducationalForm::class);
    }

    public function getStudentCountAttribute()
    {
        $count = 0;

        foreach ($this->courses as $course)
        {
           $count+= $course->studentCount;
        }

        return $count;
    }

    public function getTeacherCountAttribute()
    {
        $count = 0;
        foreach ($this->courses as $course)
        {
            $count += $course->teacherCount;
        }
        return $count;
    }
}
