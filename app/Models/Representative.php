<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'first_name', 'middle_name', 'birth_date', 'gender_id','phone'];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
