<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['specialization_id', 'birth_date','last_name', 'first_name', 'middle_name', 'speciality', 'disability_id', 'parttime_work', 'working_rate', 'phone', 'address_reg', 'address_act', 'gender_id', 'education_id', 'work_since', 'edu_teach'];
    public function getExperienceAttribute()
    {
        return (Carbon::today())->diff(Carbon::createFromFormat('Y-m-d',$this->work_since));
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function getYearsAttribute()
    {
        return (Carbon::today())->diff(Carbon::createFromFormat('Y-m-d',$this->birth_date));
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function disability()
    {
        return $this->belongsTo(Disability::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

}
