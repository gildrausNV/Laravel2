<?php

namespace App\Http\Controllers;

use App\Models\SkiSlope;
use Illuminate\Http\Request;

class MountainSlopeController extends Controller
{
    public function index($mountain_id){
        $slopes = SkiSlope::get()->where('mountain_id' ,$mountain_id);
        if (is_null($slopes))
            return response()->json('data not found', 404);
            return response()->json($slopes);
    }
}
