<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Auth;
use DB;
use App\User;
use App\Models\Modrator;
use TCG\Voyager\Models\Role;
use App\ConditionFsinger;
use App\ConditionMsinger;

class SingerController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//$this->middleware('auth')->except(['loginModrator','showLoginFormModrator']);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
  public function index() {
    // forget if exists before 
		session()->forget('role');

		session()->put('role', 'singer');

		return view('singers');
	}
  
	/**
	 * Show the application user Orders.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
  public function tours(){
    
    if(Auth::guard('moderator')->check()){
       $orders = Order::where("provided_by_marina",0)->whereSingerId(Auth::guard('moderator')->user()->user_id)->get();		
    }else{
      $orders = Order::where("provided_by_marina",0)->whereSingerId(Auth::user()->id)->get();
    }
    
    
      
     return view('user.tours', compact('orders'));
	}
  
  public function showLoginFormModrator(){
    return view('moderator.login');
  }
  
  public function singers(){
    return view('singers');
  }
  
  public function RegisterOrLogin(){
    return view('RegisterOrLogin');
  } 
  
  public function loginSinger(){
    return view('loginsinger');
  } 
  
  public function registerSinger(){
    return view('registerSinger');
  }
  
  public function loginModrator(){
   	//->guard(
      //)

    if (auth()->guard('moderator')->attempt(['email' => request('email'), 'password' => request('password')])) {
     
        Auth::login( auth()->guard('moderator')->user());
        return redirect('/');
    }
    return back()->withErrors(['email' => 'Email or password are wrong.']);
  }
  
  public function registerCondition($gender){
      if($gender == 'male'){
         $conditions =  ConditionMsinger::all();
      }elseif($gender == 'female'){
         $conditions =  ConditionFsinger::all(); 
      }
      
      return view('contractSinger',compact('conditions'));
  }

}