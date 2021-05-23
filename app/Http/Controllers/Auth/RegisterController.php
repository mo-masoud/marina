<?php

namespace App\Http\Controllers\Auth;

use App\VivaSms\Viva;
use abdullahobaid\mobilywslaraval\Mobily;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	//protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'name'      => ['required', 'string', 'max:255'],
			'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
			'password'  => ['required', 'string', 'min:6', 'confirmed'],
			'phone'     => ['required', 'integer'],
			'checkmark' => ['required'],
			'gender' => ['required'],
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function register() {
        Request()->session()->put('singer_type', 10);

	    if(!session('user_data')){
    	    $validatedData = Request()->validate([
          		'name'      => ['required', 'string', 'max:255'],
    			'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
    			'password'  => ['required', 'string', 'min:6', 'confirmed'],
    			'phone'     => ['required'],
    			'checkmark' => ['required'],
    			'gender' => ['required'],
        	]);
	    }
	    
		if (request('code')) {

			if (request('code') == session('user_data')['code']) {
     
				$user = User::create([
					'name'     => session('user_data')['name'],
					'email'    => session('user_data')['email'],
					'approved' => session('user_data')['approved'],
					'phone'    => session('user_data')['phone'],
					'gender'    => session('user_data')['gender'],
					'role_id'    => session('user_data')['role_id'],
					'national_id'    => session('user_data')['national_id'],
					'birthdate'    => Carbon::parse(session('user_data')['birthdate']),
					'avatar'    => session('user_data')['avatar'],
					'logo'    => session('user_data')['logo'],
				// 	'logo'    => session('user_data')['seal'],


					'password' => bcrypt(session('user_data')['password']),
				]);
                
                if(session('user_data')['approved'] == 1){
    				session()->forget('user_data');
    				auth()->login($user);
    				return redirect('/')->with('success', 'تم التسجيل بنجاح');
                }else{
                    session()->forget('user_data');
    				return redirect('/')->with('success', "تم تسجيل الحساب بنجاح وفي انتظار تفعيله من مسئول الموقع");
                }

			}else{
				session()->flash('error', trans('كود التحقق غير صحيح'));
				return view('auth.code_verfiy');
			}

		}else{
			$data= request()->all();
			
            if(request()->has('singer')){
                $data['role_id'] = \TCG\Voyager\Models\Role::whereName('singer')->firstOrFail()->id;
                $data['approved'] = 0 ;
            }else{
            	$data['role_id'] = \TCG\Voyager\Models\Role::whereName('user')->firstOrFail()->id;
            	$data['approved'] = 1 ;
            }
      
            if(request()->hasFile('avatar')){
                $image= request()->file('avatar')->store('users');
                $data['avatar'] = $image;
            }else{
                $data['avatar'] = null;
            }
            
            if(request()->hasFile('logo')){
                $image1= request()->file('logo')->store('singerLogo');
                $data['logo'] = $image1;
            }else{
                $data['logo'] = null;
            }
            if(request()->hasFile('seal')){
                $image1= request()->file('seal')->store('singerLogo');
                $data['seal'] = $image1;
            }else{
                $data['seal'] = null;
            }
            
            if(request()->birthdate){
                $date = str_replace('/', '-', $data['birthdate']);
                $data['birthdate'] = str_replace(' ', '',$date);
            }else{
                $data['birthdate'] = null;
            }
            
            if(!request()->national_id){
                $data['national_id'] = null;
            }
            
            $data['code'] = rand(1000, 9999);
			$msg =  '  كود التسجيل فى مارينا : ' . $data['code'];

            if(send_sms($msg,request()->phone)){
				session(['user_data' => $data]);
				return view('auth.code_verfiy')->with('userdata', session('user_data'));
            }else{

				session()->flash('error','Wrong Mobile Number');
                return back()  ;
            }
    

			session(['user_data' => $data]);
			return view('auth.code_verfiy')->with('userdata', session('user_data'));

		}

	}
	
	public function resend(){
	     			$msg =  '  كود تسجيلك فى مارينا : ' . session('user_data')['code'];

	                if(send_sms($msg,session('user_data')['phone'])){

	return view('auth.code_verfiy')->with('userdata', session('user_data'));
}
else{
                return back()  ;
}
	}
	public function send_sms($message,$mobile) {
       $client = new \GuzzleHttp\Client();
        $request = $client->get("http://api.unifonic.com/wrapper/sendSMS.php?userid=Marinmusic2030@gmail.com&password=Hussain@123&msg=".$message."&sender=MARINA&to=".$mobile."&encoding=UTF8");
        $response = $request->getBody();
   $response =  (explode("<br />",$response));
      return substr($response[0], -1) == "0" ? true : false ;
}

}
