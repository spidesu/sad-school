<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function subject()
    {
        $this->belongsTo(Subject::class);

    }

    public function quarter()
    {
        $this->belongsTo(Quarter::class);
    }

}
