<?php

namespace App\Http\Controllers;

use App\Models\Grooms;
use App\Models\Order;
use App\Models\Remittance;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use abdullahobaid\mobilywslaraval\Mobily;
use App\Models\Bank;
use DB;

class OrdersController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index() {
            
		if (session('singer_id')) {
			$singer = User::whereId(session('singer_id'))->first();
		} else {
			$singer = null;
		}

		return view('contract.index', compact('singer'));
	}

	/**
	 * find the order
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function find() {
	   // dd('f');
		$order = Order::whereIn('approved', [1,2])->where('code_number', request('code_number'))->first();


		if ($order) {
		    if($order->user_id ==auth()->id()||$order->singer_id==auth()->id())
			return redirect('contract/' . $order->code_number);
		    else
                abort(403, 'Unauthorized action.');
		} else {
			return back()->with('error', 'contract number is not found or still pending please check it or contact the support');
		}



	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	public function show($code_number) {
	   // dd("S");
             $singers=User::where('role_id',4)->get();

          // dd('jh');
		$order = Order::whereIn('approved', [1,2])->where('code_number', $code_number)->first();



		if ($order) {
  /*if($order->closed==1)
  {session()->flash('info','تم انتهاء العقد الخاص بك');
  return back();

  }


            if($order->canceled==1)
            {session()->flash('info','تم الغاء العقد الخاص بك');
                return back();

            }*/
            if ($order->user_id == Request()->user()->id) {


                if ($order->singer_id != null) {
                    $singer = User::whereId($order->singer_id)->first();
                }
                return view('contract.show', compact('order', 'singer','singers'));
            }


            if (auth()->id()==$order->singer_id) {
                return view('user.singer_contract', compact('order'));
            }




        }
else
{
    return redirect('/')->with('error','هذا العقد  في انتظار الموافقه عليه من قبل الاداره وسيكون صالح بعدها للمراجعه والتعديل');
}
	}

  	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showModeratorsOrder($id) {
    	if ($auth = auth()->guard('moderator')->check()) {
        $order = Order::where('id',$id)->firstOrFail();
        if(auth()->guard('moderator')->user()->user_id == $order->singer_id){
          return view('moderator.orders.index',compact('order'));
        }else{
          return redirect('/')->with('error','you can not edit this order not your own');
        }
		}else{
      return view('welcome');
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	public function addGroom($code_number) {
	    

	    
	    
		$order = Order::whereIn('approved', [1,2])->where('code_number', $code_number)->first();

		if ($order->singer_id != null) {
		    
		    
			$singer = User::where('id',$order->singer_id)->first();
		}
		
    //         $message = 'عزيزي العميل لقد تم ارسال طلبكم بإضافة عريس الي و سيتم تحويلة الى المختص و الرد عليك خلال 24 ساعة رقم العقد   '.$code_number;
		    
		  //  $mobile = User::find($order->user_id)->phone;
    //             send_sms($message,$mobile);
		
		
		return view('contract.addGroom', compact('code_number', 'singer'));
	}

	public function addGroomPost($code_number) {

		$data = $this->validate(request(), [
			'name'     => 'required|string',
			'identity' => 'required',
			'birthday' => 'required|date',
			'phone'    => 'required',
            'price' =>'required',
            'identity_source'=>'required'

		], [], [
			'name'     => trans('front.name_bridal'),
			'identity' => trans('front.identity'),
			'birthday' => trans('front.birthday'),
			'phone'    => trans('front.mobile'),
			'identity_source'=>'جهه اصدار الهوية مطلوبة'

		]);
		$order = Order::whereIn('approved', [1,2])->where('code_number', $code_number)->first();
//dd($data);

        $data['identity_source'] = request()->identity_source;
		$data['order_id'] = $order->id;
//$data['approved']=2;

		Grooms::create($data);

		//session()->flash('info', trans('front.groom_added_success'));
        session()->flash('info', 'تم تسجيل طلبكم نأمل إرسال العربون  وقيمته '.$data['price'].'خلال ٢٤ ساعه او سوف يتم حذف العريس الحالي من النظام تلقائيا');
        
        
        $message = 'عزيزي العميل تم ارسال طلب (اضافة عريس الى العقد رقم '.$code_number.' ) للموظف المختص نأمل منكم الانتظار لحين تتم المراجعة والموافقة على طلبكم . وشكراً لاختياركم موقع مارينا الغربية .';	
        
        
        
        send_sms($message ,\App\User::find($order->user_id)->phone);

		return redirect('contract/' . $code_number);
	}

	/**
	 * delay of joy
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	

	public function delayPost($code_number) {

		$data = $this->validate(request(), [
			'reason_of_edit' => 'required|string',
			'new_date'       => 'required',

		], [], [
			'reason_of_edit' => trans('front.reason_of_edit'),
			'new_date'       => trans('front.hejry_date'),
			]);


		$data['new_date'] =date('Y-m-d h:i:s', strtotime(request('new_date')));//str_replace('/', '-', $data['new_date']);
		//$data['new_date'] = //str_replace(' ', '',$data['new_date']);
		//$data['new_date'] =// Carbon::parse($data['new_date']);
		$data['delied']=2;
        
        
        
        
      
		Order::where('code_number', $code_number)->first()->update($data);
	//	dd(Order::where('code_number', $code_number)->first());


						$order = Order::where('code_number',$code_number)->first();
                        
                        
                         $title = $code_number. ': طلب تأجيل عقد رقم ';
                                      $content =Request('reason_of_edit');
                                      
                        
                        $mods = DB::table('modrators')->where('user_id',$order->singer_id)->get();
                                 
                                         foreach($mods as $item){
                                             
                                              $data = ['title' => $title, 'content' => $content , 'target' => $item->email];
                                    
                                        send_mail($item->email,$data);
                                             
                                         }
                                         
                                   
                                    $message='عزيزي العميل تم ارسال طلب (تأجيل العقد رقم '.$code_number.' ) للموظف المختص نأمل منكم الانتظار لحين تتم المراجعة والموافقة على طلبكم . وشكراً لاختياركم موقع مارينا الغربية .';
		                           // $message .='  برقم العقد ('.$code_number.')';
                        		    $mobile = User::find($order->user_id)->phone;
                                        send_sms($message,$mobile);
                                   
                                   		session()->flash('info', trans($message));
                                                  
				// 		send_sms(trans('front.delay_success'),\App\User::find($order->user_id)->phone);

		return redirect('contract/' . $code_number);
	}

	/**
	 * close of joy
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	public function closePost($code_number) {

	 	Order::where('code_number', $code_number)->update(['closed' => 2]);
		$order = Order::where('code_number', $code_number)->first();

		$msg  = " تم إقفال عقدكم رقم     " ;
        $msg .= $order->code_number;

                $msg .= " شاكرين ومقدرين حسن تعاونكم معنا ";

		if($order->bank_id){
		    $bank_id = $order->bank_id;

		}
		elseif($bank = Bank::where('name_of_owner',User::find($order->singer_id)->name)->first()){
		    		    $bank_id = $bank->id;

		}
		if(!$bank_id){
		    		    $bank_id = Bank::where('role','admin')->first()->id;
		}



$msg =  'تم تنفيذ طلبكم بإغلاق العقد رقم ('.$order->code_number.') نأمل إرسال مبلغ الشرط الجزائي على حساب ';

            $msg .= "مصرف  " .Bank::find($bank_id)->bank_name;
            $msg .=" رقم الحساب ". Bank::find($bank_id)->account_number;
            $msg .= " رقم الحساب مع الايبان  ".Bank::find($bank_id)->account_number_with ;
            $msg .= " إسم المستفيد ". Bank::find($bank_id)->name_of_owner;


$msg .= " حتى يتم إقفال العقد  ";
// 		session()->flash('info', trans('front.closed_success'));
		session()->flash('info',$msg);


                 
$message = 'عزيزي العميل تم ارسال طلب ( باغلاق العقد رقم '.$code_number.' ) للموظف المختص نأمل منكم الانتظار لحين تتم المراجعة والموافقة على طلبكم . وشكراً لاختياركم موقع مارينا الغربية .';	
        
        
        send_sms($message ,\App\User::find($order->user_id)->phone);

		return redirect('contract/' . $code_number);
	}




        public function send_sms($message,$mobile) {
           $client = new \GuzzleHttp\Client();
            $request = $client->get("http://basic.unifonic.com/wrapper/sendSMS.php?userid=Marinmusic2030@gmail.com&password=Hussain@123&msg=".$message."&sender=MARINA&to=".$mobile.""."encoding=UTF8");
            $response = $request->getBody();
           $response =  (explode("<br />",$response));
      return substr($response[0], -1) == "0" ? true : false ;
}





	/**
	 * cancel of joy
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */
	public function cancel($code_number) {
		$order = Order::where('approved', 1)->where('code_number', $code_number)->first();

		return view('contract.cancel', compact('order', 'code_number'));
	}

	public function cancelPost($code_number) {
		$data = $this->validate(request(), [
			'reason_of_edit' => 'required|string',
			'attach_proof'   => 'required|image',

		], [], [
			'reason_of_edit' => trans('front.reason_of_edit'),
			'attach_proof'   => trans('front.attach_proof'),
		]);

		$image                = request()->file('attach_proof')->store('canceled_attached');
		$data['attach_proof'] = $image;

		Order::where('code_number', $code_number)->update(['canceled' => 2]);

            $msg = trans('front.canceled_message').' رقم  '.'('.$code_number.')';
	
	
		session()->flash('info',$msg);


				$order = Order::where('code_number',$code_number)->first();
				
				$message = 'عزيزي العميل تم ارسال طلب ( بالغاء العقد رقم '.$code_number.' ) للموظف المختص نأمل منكم الانتظار لحين تتم المراجعة والموافقة على طلبكم . وشكراً لاختياركم موقع مارينا الغربية .';	
		                send_sms($message,\App\User::find($order->user_id)->phone);

		return redirect('contract/' . $code_number);
	}

	/**
	 * cancel of joy
	 *
	 * @param  int  $code_number
	 * @return \Illuminate\Http\Response
	 */


	public function print_singer($code_number){

        $order = Order::/*where('approved', 1)->*/where('code_number', $code_number)->first();
      //  dd($order);
        if($order ){


        $Remittance = Remittance::where('order_id', $order->id)->first();
        if ($order->singer_id != null) {
            $singer = User::whereId($order->singer_id)->first();
        }
     if( $order->order_type=='personal')
     {
        // dd('d');
         return view('contract.printShow', compact('order', 'singer', 'Remittance'));
     }


            else
            {//dd('d');
               return  view('contract.printShow2', compact('order', 'singer', 'Remittance'));
            }

        //
        //    return view('contract.printShow2'
        }
        else
        return back()->with('error', 'لم يتم العثور على رقم العقد ، يرجى التحقق منه أو الاتصال بالدعم');

    }
	public function print() {

		if (session('singer_id')) {
			$singer = User::whereId(session('singer_id'))->first();
		} else {
			$singer = null;
		}

		return view('contract.print', compact('singer'));
	}

	public function printPost() {
		$order = Order::where('approved', 1)->where('code_number', request('code_number'))->first();

		if ($order) {
			return redirect('contract/print/' . $order->code_number);
		} else {
			return back()->with('error', 'لم يتم العثور على رقم العقد ، يرجى التحقق منه أو الاتصال بالدعم');
		}
	}

	public function printShow($code_number)
    {
        $contract_print_type = session('contract_print_type');

        $order = Order::where('approved', 1)->where('code_number', $code_number)->first();
        if ($order)
        {      $marina_array = array('male', 'female');
        if (in_array($order->singer_gender, $marina_array)) {
            if ($contract_print_type != "marina") {
                return back()->with('error', 'للدخول لهذا العقد يجب عليك الدخول من بوابه مارينا');
            }
        }

        if (!in_array($order->singer_gender, $marina_array)) {
            if ($order->singer_id != $contract_print_type) {
                return back()->with('error', 'للدخول لهذا العقد يجب عليك الدخول من بوابه المطرب / المطربة');
            }
        }

        if ($order) {
            if ($order && $order->user_id == Request()->user()->id || $order->singer_id == Request()->user()->id) {
                if ($order->order_type == 'personal') {
                    $Remittance = Remittance::where('order_id', $order->id)->first();
                    if ($order->singer_id != null) {
                        $singer = User::whereId($order->singer_id)->first();
                    }
                    return view('contract.printShow', compact('order', 'singer', 'Remittance'));
                } else {
                    $Remittance = Remittance::where('order_id', $order->id)->first();
                    if ($order->singer_id != null) {
                        $singer = User::whereId($order->singer_id)->first();
                    }
                    return view('contract.printShow2', compact('order', 'singer', 'Remittance'));
                }

            } else {
                return view('errors.not_found');
            }
        } else {
            return view('errors.not_found');
        }
    }
else
   {

       return view('errors.not_found');
   }

//     	$Remittance = Remittance::where('order_id',$order->id)->first();
// 		if ($order) {
// 			if ($order->singer_id != null) {
// 				$singer = User::whereId($order->singer_id)->first();
// 			}
// 			return view('contract.printShow', compact('order', 'singer','Remittance'));
// 		} else {
// 			return view('errors.not_found');
// 		}
	}

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Order $order) {
       
$order=Order::find($id);

      $start_time = Carbon::parse(request('start_time'))->format('H:i');
      $end_time   = Carbon::parse(request('end_time'))->format('H:i');

      if (strpos(request('date'), '/') !== false ) {
         $date = str_replace('/','-',request('date'));
         $date = str_replace(' ','',$date);
      }else{
        $date =request('$date');
      }

      if (strpos(request('hejry_date'), '/') !== false ) {
         $hejry_date = str_replace('/','-',request('hejry_date'));
         $hejry_date = str_replace(' ','',$hejry_date);
      }else{
        $hejry_date =request('hejry_date');
      }
      session()->put('machine',request()->machine);

      $data = [
          'company_type'               => request('company_type'),
          'company_name'               => request('company_name'),
          'commercial_registration_no' => request('commercial_registration_no'),
          'company_owner_name'         => request('company_owner_name'),
          'registration_id_number'     => request('registration_id_number'),
          'director_name'              => request('director_name'),
				'occasion_id'     => request('occasion_id'),
				'number_bridal'   => request('number_bridal'),
				'name_bridal'     => request('name_bridal'),
				'identity'        => request('identity'),
				'birthday'        => request('birthday'),
				'nationality'      => request('nationalty'),
				'identity_source' => request('identity_source'),
				'email_address'   => request('email_address'),
				'phone_bridal'    => request('phone_bridal'),
				'carol_type'      => request('carol_type'),
				'hejry_date'      => Carbon::parse($hejry_date),
				'date'            => Carbon::parse($date),
				'start_time'      => $start_time,
				'end_time'        => $end_time,
				'hotel_name'      => request('hotel_name'),
				'street_name'     => request('street_name'),
				'hall_id'         => request('hall_id'),
				'country_id'      => request('country_id'),
				'city_id'         => request('city_id'),
				'state_id'        => request('state_id'),
				'identity_image'  => request('identity_image'),
				'code_number'     => request('code_number'),
				'price'           => request('price'),
          'machines'=>json_encode(session('machine')),
'singer_id'=>request()->has('singer_id')?request('singer_id'):$order->singer_id,
          'canceled'=>request('canceled'),
          'closed'=>request('closed'),
          'delied'=>request('delied'),
          'approved'=>isset(request()->approved)?request()->approved:$order->approved
				
			];

      if(request('identity_image')){
        $identity_image     = request()->file('identity_image')->store('identity');
		    $data['identity_image'] = $identity_image;
      }

    	$order->where('id',$id)->update($data);


      session()->flash('success', trans('front.updated_record'));



      if($order->canceled==2 && request('canceled')==1)
      {
          $message='عزيزي العميل تمت الموافقه على طلب إلغاء الحفل والذي يحمل رقم العقد الخاص بكم '.$order->code_number;
                    $message.=' وتم استلام مبلغ الشرط الجزائي والمقرر بشروط العقد وعليه تم فسخ العقد وإغلاقه
                     شاكرين ومقدرين حسن تعاملكم معنا. موقع مارينا الغربية لخدمة كبار الشخصيات.';

                $mobile = User::find($order->user_id)->phone;
                send_sms($message,$mobile);
          
      }



        if($order->closed==2 && request('closed')==1)
        {
             $message= $order->code_number."عزيزي العميل نفيد سعادتكم بأنه تم إغلاق العقد رقم ";
                 $message.='شاكرين ومقدرين حسن تعاملك معنا.موقع مارينا الغربية لخدمة كبار الشخصيات';

              // $message.=$order->code_number.'رقم العقد الخاص بكم هو ';
                $mobile = User::find($order->user_id)->phone;
                send_sms($message,$mobile);

        }

        if(request('delied')==1)
        {
            $message='عزيزي العميل تمت الموافقه على طلب تأجيل الحفل والذي يحمل رقم العقد الخاص بكم '.$order->code_number;
              
                $mobile = User::find($order->user_id)->phone;
                send_sms($message,$mobile);
          

        }
        
        
        
        
        if( request('canceled')==2)
      {
          $message='عزيزي العميل لم  تتم الموافقه على طلب إلغاء الحفل والذي يحمل رقم العقد الخاص بكم '.$order->code_number;

                $mobile = User::find($order->user_id)->phone;
                send_sms($message,$mobile);
          
      }



        if(request('closed')==2)
        {
             $message= $order->code_number."عزيزي العميل نفيد سعادتكم بأنه لم  يتم إغلاق العقد رقم ";

              // $message.=$order->code_number.'رقم العقد الخاص بكم هو ';
                $mobile = User::find($order->user_id)->phone;
                send_sms($message,$mobile);

        }

        if(request('delied')==2)
        {
            $message='عزيزي العميل لم يتم الموافقه على طلب تأجيل الحفل والذي يحمل رقم العقد الخاص بكم '.$order->code_number;
              
                $mobile = User::find($order->user_id)->phone;
                send_sms($message,$mobile);
          

        }
        
        


        if(request('delied') =='' && request('closed') ==''&& request('canceled') == ''){
      $message='تم حفظ العقد الخاص بك رقم ' .$order->code_number.'بشكل مبدئى لدى موقع مارينا';
      if(auth()->guard('moderator')->check())
      
      if($order->approved == 2){
          
          
        $message = 'نفيدكم بانه تم تأكيد حفلكم الكريم للعقد رقم  '.$order->code_number.' نأمل الدخول علي النظام وطباعة العقد. شكرا';
      
          //$message='تم حفظ العقد الخاص بك رقم ' .$order->code_number.'بشكل مبدئى لدى موقع مارينا';
      //$message.='من قبل مدير الاعمال '.auth()->user()->name;

      $mobile=User::find($order->user_id)->phone;
      send_sms($message,$mobile);
        }
        
            
            
            
        }
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $order = Order::find($id);
        $order->delete();
        session()->flash('success', trans('front.deleted_record'));
        return redirect('/');
    }

    /**
     * send Code To User again
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SendCodeToUser($id) {
        $order = Order::find($id);
        $mobily = new Mobily();
        $userPhone = $order->user->phone;


				$this->send_sms( 'Your code is : ' . $order->code_number ,$userPhone);
					session()->flash('success', trans('front.codeSent'));
           return redirect()->back();



    }
    
    // this is new functions
    
    
    
    public function delay($code_number) {

		$order = Order::where('approved', 1)->where('code_number', $code_number)->first();
	    if($order)

		return view('contract.delay', compact('order', 'code_number'));
	    else {
            session()->flash('info', 'هذا الرقم غير موجود بسجلاتنا');
            return redirect()->back();
        }
	}
    
    public function close($code_number) {
		$order = Order::whereIn('approved',[1,2])->where('code_number', $code_number)->first();

		return view('contract.close', compact('order', 'code_number'));
	}
    
    
    public function delay_order(Request $request) {

		$order = Order::find($request->id);
		$order->update([
		    'delied'=>$request->type
		    ]);
		    
		    if($request->type != null){
		    if($request->type == 0){
		    $message='عزيزي العميل لم يتم الموافقه على طلب تأجيل الحفل والذي يحمل رقم العقد الخاص بكم '.$order->code_number;    
		    }    else{
		        $message='عزيزي العميل تم الموافقه على طلب تأجيل الحفل والذي يحمل رقم العقد الخاص بكم '.$order->code_number;    
		    }
		    
		    
		    $mobile = User::find($order->user_id)->phone;
                send_sms($message,$mobile);
		    }
		    
		    
		    
	}
    
    public function close_order(Request $request) {
		    $order = Order::find($request->id);
				$order->update([
		    'closed'=>$request->type
		    ]);
		    		    
		    if($request->type != null){
		    if($request->type == 0){
		    $message='عزيزي العميل لم  يتم الموافقه على طلب اقفال الحفل والذي يحمل رقم العقد الخاص بكم '.$order->code_number;    
		    }    else{
		        $message='عزيزي العميل تم الموافقه على طلب اقفال الحفل والذي يحمل رقم العقد الخاص بكم '.$order->code_number;    
		    }
		    
		    
		    $mobile = User::find($order->user_id)->phone;
                send_sms($message,$mobile);
		    } 
		    		    
	}
	
	    public function cancle_order(Request $request) {
		 $order = Order::find($request->id);
				$order->update([
		    'canceled'=>$request->type
		    ]);
		    
		    
		    if($request->type != null){
		    if($request->type == 0){
		    $message='عزيزي العميل لم  يتم الموافقه على طلب إلغاء الحفل والذي يحمل رقم العقد الخاص بكم '.$order->code_number;    
		    }    else{
		        $message='عزيزي العميل تم الموافقه على طلب إلغاء الحفل والذي يحمل رقم العقد الخاص بكم '.$order->code_number;    
		    }
		    
		    
		    $mobile = User::find($order->user_id)->phone;
                send_sms($message,$mobile);
		    }
		    
	}
	
	public function approve_order(Request $request) {
		 $order = Order::find($request->id);
				$order->update([
		    'approved'=>$request->type
		    ]);
		    
		    
		    if($request->type != null){
		    if($request->type == 0){
		    $message = 'نفيدكم بانه تم تأكيد حفلكم الكريم للعقد رقم  '.$order->code_number.' نأمل الدخول علي النظام وطباعة العقد. شكرا';
		    }    else{
		        $message = 'نفيدكم بانه لم يتم تأكيد حفلكم الكريم للعقد رقم  '.$order->code_number;
		    }
		    
		    
		    $mobile = User::find($order->user_id)->phone;
                send_sms($message,$mobile);
		    }
		    
		    
		    
		    
		    
		    
	
    
}
public function DeleteOrder($id){
    
    
    $order = Order::find($id);
    $order->delete();
    session()->flash('info','تم حذف العقد');
    return redirect()->back();
}

}
