<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use Validator;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('complain');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'image' => 'sometimes|nullable|image',
            'name' => 'required|string',
            'phone' => 'required',
            'sort' => 'required',
            'text' => 'required|string',
        ]);
        if(request('image')){
            $image = request()->file('image')->store('complain');
        }else{
            $image = null;
        }
        

        $message = new Complain(array(

        'name' => request('name'),
        'phone' => request('phone'),
        'sort' => request('sort'),
        'text' => request('text'),
        'image' => $image

        ));

		
    
        $message->save();

        session()->flash('تم الإرسال', 'تم إرسال الشكوى بنجاح');

    				return redirect('/')->with('success', "تم تسجيل إرسال الشكوى بنجاح");

    }

}
