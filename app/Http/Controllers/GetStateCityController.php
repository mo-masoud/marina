<?php

namespace App\Http\Controllers;
use App\Models\{Country,State,City};
use Illuminate\Http\Request;

class GetStateCityController extends Controller {
    
    public function state(Request $request){
      
    if(!$request->country_id)
        return [];
        
    $data=State::select('name','id')->where('country_id',$request->country_id)->get();
    return response()->json($data);
    }
    
    public function city(Request $request){
            if(!$request->state_id)
        return [];
        
    $data=City::select('name','id')->where('state_id',$request->state_id)->get();
    return response()->json($data);
    }
} 