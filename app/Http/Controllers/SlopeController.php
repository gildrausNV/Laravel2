<?php

namespace App\Http\Controllers;

use App\Http\Resources\SlopeResource;
use Illuminate\Http\Request;
use App\Models\SkiSlope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SlopeController extends Controller
{
    public function index(){
        $slopes = SkiSlope::all();
        return $slopes;
    }

    public function show(SkiSlope $slope){
        //$slope = SkiSlope ::find($id);
        return new SlopeResource($slope) ;
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mountain_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $slope = SkiSlope::create([
            'name'=>$request->name,
            'mountain_id'=>$request->mountain_id,
            'user_id'=>Auth::user()->id
        ]);

        return response()->json(['Slope is created succesfully.', new SlopeResource($slope)]);
    }

    public function update(Request $request, SkiSlope $slope){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mountain_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $slope->name = $request->name;
        $slope->mountain_id = $request->mountain_id;

        $slope->save();

        return response()->json(['Slope is updated successfully.', new SlopeResource($slope)]);
    }

    public function destroy(SkiSlope $slope){
        $slope->delete();

        return response()->json('Slope is deleted successfully');
    }
}
