<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    use HasFactory;

    public function SkiSlopes(){
        return $this->hasMany(SkiSlope::class);
    }
}
