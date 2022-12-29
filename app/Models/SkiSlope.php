<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkiSlope extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Mountain(){
        return $this->belongsTo(Mountain::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
