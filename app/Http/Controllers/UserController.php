<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Auth;
use Image;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Models\Modrator;
use App\Models\Notification;
use TCG\Voyager\Models\Role;
class UserController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application user Orders.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function myorders() {
	    $query=new Order();
    if(Auth::guard('moderator')->check()){

        $orders = Order::where("provided_by_marina",0)->whereSingerId(Auth::guard('moderator')->user()->user_id)->get();
    }else{
       if(Auth::user()->role_id == '4') {
           //dd('dfdf');
        $orders = $query->whereSingerId(Auth::user()->id)->get();
      } 
      else{ 
        $orders = $query->whereUserId(Auth::user()->id)->get();
      }
    }

		return view('user.my-orders', compact('orders'));
	}

	public function notifications(){
	    
	    
	    
    if(Auth::guard('moderator')->check()){
       $notifications = Notification::where('causer_id', Auth::guard('moderator')->user()->user_id)->orderBy('created_at','DESC')->get();
       $read = Notification::whereIn('id',$notifications->pluck('id'))->update([
           'is_read'=>1
           ]);
    }else{
      $notifications =Notification::where('causer_id', Auth::user()->id)->orderBy('created_at','DESC')->get();
      
      $read = Notification::whereIn('id',$notifications->pluck('id'))->update([
           'is_read'=>1
           ]);
      
    }
    return view('user.notifications', compact('notifications'));
	}
	
	    public function delete_notification($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
    }
    

	public function invoices(){
    if(Auth::guard('moderator')->check()){
		  $orders = Order::whereSingerId(Auth::guard('moderator')->user()->user_id)->get();		
    }else{
      $orders = Order::whereSingerId(Auth::user()->id)->get();		
    }
    
    return view('user.invoices', compact('orders'));
	}

	public function invoice($id){

		$order = Order::whereId($id)->firstOrFail();		
		return view('user.invoice', compact('order'));

	}
	
	public function profile(){
	    
	    return view('profile', array('user' => Auth::user()) );
	    
	}
	
	public function update_seal(Request $request){
	    
	    //Handle the user upload of seal
	    if($request->hasFile('seal')) {
	        $seal = $request->file('seal');
	        $filename= time() . '.' . $seal->getClientOriginalExtension();
	        Image::make($seal)->save( public_path('images/uploads/' . $filename) );
	        
	        $user = Auth::user();
	        $user->seal = $filename;
	        $user->save();
	}
	
	return view('profile', array('user' => Auth::user()) );
	
	}
	

}