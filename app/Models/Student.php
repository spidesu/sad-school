<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['disability_id', 'low_money', 'no_reps', 'migrant', 'last_name', 'first_name', 'middle_name', 'gender_id', 'health_group_id', 'birth_date', 'medical_doc_fact', 'address_reg', 'address_act', 'comment'];
    protected $hidden = [];

    public function representatives()
    {
        return $this->belongsToMany(Representative::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function disability()
    {
        return $this->belongsTo(Disability::class);
    }

    public function getYearsAttribute()
    {
        return (Carbon::today())->diff(Carbon::createFromFormat('Y-m-d',$this->birth_date));
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function sheets()
    {
        return $this->hasMany(Sheet::class);
    }
}
