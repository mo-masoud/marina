<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Notification;
use Auth;
class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//$this->middleware('auth');
	
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
    
		if (auth()->guard('moderator')->check()) {
      $orders = Order::where("provided_by_marina",0)->where('singer_id',auth()->guard('moderator')->user()->user_id)->get();
                    $notifications= Notification::where('causer_id',auth()->guard('moderator')->user()->user_id)->where('is_read',0)->count();
			return view('moderator.moderator',compact('orders','notifications'));
			
		} elseif(auth()->guard('web')->check()) {
		    
            $notifications= Notification::where('causer_id',Auth::user()->id)->where('is_read',0)->count();
			return view('home',compact('notifications'));
		}else{
      return view('welcome');
    }

	}
	
	
	public function deleteOrders(){
	    
	    
	    if(Request()->ids != null){
	        
	    
	    $orders =Order::whereIn('id',Request()->ids)->delete();
	    session()->flash('success', 'تم الحذف');
	     return back();
	    }else{
	        
	        session()->flash('error', 'لم يتم تحيد اي عقد');
	     return back();
	    }
	    
	}
	
	
	
}
