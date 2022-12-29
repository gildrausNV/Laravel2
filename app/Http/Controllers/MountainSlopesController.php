<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkiSlope;

class MountainSlopesController extends Controller
{
    public function index($mountain_id){
        $slopes = SkiSlope::get()->where('mountain_id' ,$mountain_id);
        if (is_null($slopes))
            return response()->json('data not found', 404);
            return response()->json($slopes);
    }
}
