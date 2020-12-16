<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable =
        [
          'name', 'specialization_id'
        ];
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function getTeacherCountAttribute()
    {
        return $this->teachers->count();
    }


    public function getStudentCountAttribute()
    {
        return $this->students->count();
    }
}
