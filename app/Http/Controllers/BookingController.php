<?php

namespace App\Http\Controllers;

use abdullahobaid\mobilywslaraval\Mobily;
use App\VivaSms\Viva;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;
use App\Models\Bank;
use App\Models\Order;
use App\Models\ExtraHour;
use App\Models\Remittance;
use App\User;
use App\Nationality;
use App\BankClient;
use Auth;
use Validator;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['order_confirm','moderator_confirm_order']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_1($name = null)
    { //dd('g');
        

        switch ($name) {
        case 'persons':
            $males = User::whereRoleId(4)->where('provided_by_marina',1)->whereGender(0)->get();
            $females= User::whereRoleId(4)->where('provided_by_marina',1)->whereGender(1)->get();
            $nationalities = Nationality::all();
            $countries = \App\Models\Country::orderBy('id', 'desc')->get();
            return view('booking.personal.persons', compact('males', 'females','nationalities','countries'));
            break;
        case 'companies':
            return view('booking.companies.companies');
            break;
        default:
            return view('booking.index_1');
            break;
        }
    }

    public function index1($name = null)
    { // dd('tt');

        session()->put("provider",1);

        switch ($name) {
        case 'persons':
            $males = User::whereRoleId(4)->where('provided_by_marina',1)->whereGender(0)->get();
            $females= User::whereRoleId(4)->where('provided_by_marina',1)->whereGender(1)->get();
            $nationalities = Nationality::all();
            $countries = \App\Models\Country::orderBy('id', 'desc')->get();
            return view('booking.personal.persons', compact('males', 'females','nationalities','countries'));
            break;
        case 'companies':
            return view('booking.companies.companies');
            break;
        default:
            return view('booking.index1');
            break;
        }
    }

    public function index($name = null)
    {  //dd('gfgggd');
    
    session()->put("provider",1);
        switch ($name) {
        case 'persons':
            
            
            $males = User::whereRoleId(4)->where('provided_by_marina',1)->whereGender(0)->get();
            $females= User::whereRoleId(4)->where('provided_by_marina',1)->whereGender(1)->get();
            $nationalities = Nationality::all();
            $countries = \App\Models\Country::orderBy('id', 'desc')->get();
            
            dd($males,$females);
            
            
            return view('booking.personal.persons', compact('males', 'females','nationalities','countries'));
            break;
        case 'companies':
            
            
            
            return view('booking.companies.companies');
            break;
        default:
            

            return view('booking.index');
            break;
        }
    }

    public function step1()
    {
        
        
        $this->validate(request(), [
            'occasion_id'     => 'required|integer',
            'number_bridal'   => 'required|string',
            'name_bridal'     => 'required|string',
            'identity'        => 'required|',
            'birthday'        => 'required',
            'nationality'      => 'required|integer',
            'identity_source' => 'required|string',
            'email_address'   => 'required|email',
            'phone_bridal'    => 'required|numeric',
            'carol_type'      => 'required',
            'hejry_date'      => 'required',
            'date'            => 'required',
            'hotel_name'      => 'required|string',
            'start_time'      => 'required',
            'end_time'        => 'required',
            'street_name'     => 'required|string',
            'hall_id'         => 'required|string',
            'identity_image'  => 'required',
            'country_id'      => 'required|integer',
            'city_id'         => 'required|integer',
            'state_id'        => 'required|integer',
        ], [], [
            'occasion_id'     => trans('front.location_occasion'),
            'number_bridal'   => trans('front.number_bridal'),
            'name_bridal'     => trans('front.name_bridal'),
            'identity'        => trans('front.identity'),
            'birthday'        => trans('front.birthday'),
            'nationality'      => trans('front.nationality'),
            'identity_source' => trans('front.identity_source'),
            'email_address'   => trans('front.email_address'),
            'phone_bridal'    => trans('front.phone_bridal'),
            'carol_type'      => trans('front.carol_type'),
            'hejry_date'      => trans('front.hejry_date'),
            'date'            => trans('front.date'),
            'hotel_name'      => trans('front.hotel_name'),
            'start_time'      => trans('front.start_time'),
            'end_time'        => trans('front.end_time'),
            'street_name'     => trans('front.street_name'),
            'hall_id'         => trans('front.halls'),
            'identity_image'  => trans('front.identity_image'),
            'country_id'      => trans('front.country'),
            'city_id'         => trans('front.city'),
            'state_id'        => trans('front.state'),
        ]);



        $data= request()->except('identity_image');
        $data['code_number'] = rand(1000, 9999);
        session()->put('code_number',$data['code_number']);

            if (request()->get('singer_gender') == 'male') {
                $singer = User::findOrFail(request()->get('singer_male_id'));
                $data['singer_name_male'] = $singer->name;
                $data['singer_name_female'] = null;
                $data['singer_id'] = $singer->id;
            } else {
                $singer = User::findOrFail(request()->get('singer_female_id'));
                $data['singer_name_female'] = $singer->name;
                $data['singer_name_male'] = null;
                $data['singer_id'] = $singer->id;
            }



        $image= request()->file('identity_image')->store('identity');
        $data['identity_image'] = $image;

        session()->put('order_data', $data);
        
        $conditionsPersonal = \App\ConditionPersonal::orderBy('created_at','DESC')->get();
        
        //orderBy('created_at','DESC')->
        
        return view('booking.personal.contract', compact('conditionsPersonal'));
    }

    public function step2()
    
    {//dd(request()->condition);
     
    
     
                $conditionsPersonal = \App\ConditionPersonal::orderBy('created_at','DESC')->get();
        
        
                    //orderBy('created_at','DESC')->
        
        if(count(request()->condition)!=$conditionsPersonal->count() && request()->agree!='on')
        /*$validator = Validator::make(request()->all(), [
            'condition.*' => 'required',
            'condition.*' => 'accepted',
            'agree'       => 'required',
        ]);*/



        /*if ($validator->fails()) */{

            return view('booking.personal.contract',compact('conditionsPersonal'))->withErrors('يجب الموافقه ع جميع الشروط');

        }
        if(request()->agree=='on' ||count(request()->condition)==$conditionsPersonal->count())


         {
            return view('booking.personal.party');
        }
    }

    public function step3()
    {
        $validator = Validator::make(request()->all(), [
            'machine' => 'sometimes|nullable',
            'rhythms' => 'sometimes|nullable',
        ], [
            'machine' => trans('front.machine'),
            'rhythms' => trans('front.rhythms'),
        ]);

        session()->put('machine', request('machine'));
        session()->put('rhythms', request('rhythms'));

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            return view('booking.personal.agreements');
        }
    }

    public function step4()
    {
        $validator = Validator::make(request()->all(), [
            'number_of_hits' => 'required',
            'deposit'        => 'required',
        ], [
            'deposit'        => trans('front.deposit'),
            'number_of_hits' => trans('front.number_of_hits'),
        ]);

        $agreements = request()->except(['number_ribbons', '_token']);

        if (request('agree') == 'on') {
            $agreements['number_ribbons'] = request('number_ribbons');
        }

        session()->put('agreements', $agreements);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $bankClients = BankClient::all();
            return view('booking.personal.conversions',compact('bankClients'));
        }
    }

    public function step5()
    {
        // first check if request has code or not
        $data = [];
        if (request('sender_code')) {
            $validator = Validator::make(request()->all(), [
                'sender_code' => 'required',
            ], [
                'sender_code' => trans('front.sender_code'),
            ]);

            if (request('sender_code') == session('user_data')['code']) {

                //session()->forget('user_data');

                if ($validator->fails()) {
                    return back()->withErrors($validator);
                } else {
                    return view('booking.personal.contacts');
                }
            } else {
                session()->flash('error', 'كود التحقق غير الصحيح');
                return view('booking.personal.code_verfiy')->with('userdata', session('user_data'));
            }
        } else {
            // if request havn't request_code that mean user still typing his info so make a sms to verfiy phone

            $validator = Validator::make(request()->all(), [
                'sender_name'       => 'required',
                'relative_relation' => 'required',
                'bank_name'         => 'required',
                'account_number'    => 'required',
                'sender_phone'      => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            } else {
                $data = [];
                session()->put('Remittances', request()->all());
                $data         = request()->all();
                $data['code'] = rand(1000, 9999); //generate random code

              $msg =  'كود التحقق فى مارينا الغربية : ' . $data['code'];
            // $msg = 1;
//dd(auth()->user()->phone);
             //   dd(send_sms($msg,auth()->user()->phone));
            if(send_sms($msg,auth()->user()->phone)){
                    session(['user_data' => $data]);
                    session()->flash('success', 'تم إرسال الكود بنجاح');
                        
                    return view('booking.personal.code_verfiy')->with('userdata', session('user_data'));
                } else {

                    session()->flash('error','Wrong Mobile Number');

                    return view('booking.personal.conversions',[
                        'userdata' =>session('user_data'),
                        'bankClients' => BankClient::all(),
                        ]);
                }
            }
        }
    }

    public function step6()
    {
             $validator = Validator::make(request()->all(), [
            'contact_name'     => 'required',
            'contact_phone'    => 'required',
            'contact_relation' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            session()->put('contacts', request()->except('_token'));
            $banks = Bank::where('role','admin')->paginate(4);
            return view('booking.personal.bank', compact('banks'));
        }
    }

    public function finalStep($id)
    {
       
        $order_data  = session('order_data');
        $agreements  = session('agreements');
        $Remittances = session('Remittances');
        $contacts    = session('contacts');
        $contacts    = session('contacts');
        $bank_id    = session('bank_value');
        
        
        $ExtraHour = ExtraHour::first();
    
    
        $start_time = Carbon::parse($order_data['start_time'])->format('H:i');
        $end_time   = Carbon::parse($order_data['end_time'])->format('H:i');

        $date = str_replace('/', '-', $order_data['date']);
        $date = str_replace(' ', '', $date);

        $hejry_date = str_replace('/', '-', $order_data['hejry_date']);
        $hejry_date = str_replace(' ', '', $hejry_date);

        if ($order_data != null) {
            $data = [
                'occasion_id'     => $order_data['occasion_id'],
                'number_bridal'   => $order_data['number_bridal'],
                'name_bridal'     => $order_data['name_bridal'],
                'identity'        => $order_data['identity'],
                'birthday'        => $order_data['birthday'],
                'nationality'      => $order_data['nationality'],
                'identity_source' => $order_data['identity_source'],
                'email_address'   => $order_data['email_address'],
                'phone_bridal'    => $order_data['phone_bridal'],
                'carol_type'      => $order_data['carol_type'],
                'hejry_date'      => Carbon::parse($hejry_date),
                'date'            => Carbon::parse($date),
                'start_time'      => $start_time,
                'end_time'        => $end_time,
                'hotel_name'      => $order_data['hotel_name'],
                'street_name'     => $order_data['street_name'],
                'hall_id'         => $order_data['hall_id'],
                'user_id'         => auth()->user()->id,
                'country_id'      => $order_data['country_id'],
                'city_id'         => $order_data['city_id'],
                'state_id'        => $order_data['state_id'],
                'identity_image'  => $order_data['identity_image'],
                'singer_gender'   => $order_data['singer_gender'],
                'code_number'     => $order_data['code_number'],
                'machines'        => session('machine'),
                'rhythms'         => session('rhythms'),
                'price'           => $agreements['price'],
                'agreements'      => $agreements,
                'contacts'        => $contacts,
                'singer_id'		    => $order_data['singer_id'] ,
                'approved'		    => request('status') ?? 0,
                'bank_id'		    => $bank_id,
                'order_type'  =>'personal',
                'music'=>session()->get('music'),
                'final_submit'=>$id,
                'day'=>$order_data['day'],
                'extra_hour_price'=>$ExtraHour->extra_hours

            ];
                    
                    
                    
                    
            if (isset($order_data['singer_name_female']) && $order_data['singer_gender'] == 'female') {
                $data['singer_name']          = $order_data['singer_name_female'] ?? '';
                $data['singer_name_optional'] = $order_data['singer_name_optional_female'] ?? '';
            } else {
                $data['singer_name']          = $order_data['singer_name_male'] ?? '';
                $data['singer_name_optional'] = $order_data['singer_name_optional_male'] ?? '';
            }
            $checkOrder = Order::where('code_number', $order_data['code_number'])->first();
            if ($checkOrder) {
                return redirect('/')->with('error', 'لقد تم تسجيل العقد من قبل');
            }

            $data['provided_by_marina']=session()->get('provider');
            $order= Order::create($data);


            $Remittances['order_id'] = $order->id;

            // store remittances
            Remittance::create($Remittances);
            // send sms to user
            // 			$message = "( عميلنا العزيز سارع بسداد مبلغ العربون بقيمة  " . $agreements['deposit'] . " ريال حسب العربون  المختار من صفحه الإتفاقات الماليه فى موقع ماربنا  الغربية حتى لا يتم الغاء الطلب خلال ٢٤ ساعه )";
            $message = "";
            $message .= " عميلنا العزيز سارع بسداد مبلغ العربون بقيمة " ;
            $message .=  $agreements['deposit'] ;
            $message .= "ريال حسب العربون المختار من صفحة الاتفاقات المالية في موقع مارينا الغربية خلال 24 ساعة علما بأن ارقام الحسابات هي ";
            

            $message .= "مصرف  " .Bank::find($order->bank_id)->bank_name;
            $message .=" رقم الحساب ". Bank::find($order->bank_id)->account_number;
            $message .= " رقم الحساب مع الايبان  ".Bank::find($order->bank_id)->account_number_with ;
            $message .= " إسم المستفيد ". Bank::find($order->bank_id)->name_of_owner;

            $message .= " وأن رقم العقد الخاص بكم هو ";
            $message .= $order_data['code_number'] ;
            $message .= " وشكرا لحسن اختياركم مارينا .";

            if($order->approved == 2){
               // $message = ' مرحباً بكم في خدمة كبار الشخصيات بموقع مارينا الغرببه نفيدكم بأنه تم حفظ بياناتك حفظ مبدئي نأمل منكم الأسراع في أتمام عملية الحجز خلال ٢٤ ساعه بالدخول مره آخرى وعمل حفظ نهائي علماً بأن رقم عقدكم هو '.$order_data['code_number'];
                // $message = 'عزيزي العميل شكرا لاختياركم موقع مارينا الغربية نامل اكمال حجزكم خلال 48 ساعه من الدخول مره اخرة وعمل حفظ نهائي للعقد رقم '.$order_data['code_number'];
                //
                
                $message = 'عزيزي العميل لقد تم حفظ بياناتك وحجزكم مبدئياً. نامل اتمام حجزكم في اسرع وقت ممكن قبل حضور عميل اخر ويتم إلغاء حجزكم ورقم العقد هو  '.$order->code_number;
                send_sms($message,auth()->user()->phone);
            }
            elseif($order->approved == 0){
                send_sms($message,auth()->user()->phone);
            }

            // Save To The Log Activity For Singer Notifications
            // Caused By Here Not The Cause But The Singer That Is Caused By
            activity()->performedOn($order)->causedBy($order->singer_id)->log('يوجد حجز جديد بعقد رقم :subject.code_number من قبل العميل '.Auth::user()->name);

            if (!request('status')) {

            // destroy all session after save data
                session()->forget('order_data');
                session()->forget('machine');
                session()->forget('rhythms');
                session()->forget('agreements');
                session()->forget('Remittances');
                session()->forget('contacts');
            }



            // redirect user to his orders
            session()->flash('success', 'تم عمل الحجز بنجاح');
            return redirect('/');
        } else {
            return redirect('/')->with('error', 'fill your data first to make order');
        }




      //  dd($order);
    }


    public function moderator_confirm_order($id){
        $order=Order::find($id);

        $order->final_submit=1;
            $order->update();
        $phone=User::find(auth()->guard('moderator')->user()->user_id);
        session()->flash('success', 'تم تأكيد العقد  بنجاح');

        // return redirect('/');
        return back();

    }
    public function order_confirm($id)
    {
        $order  =  Order::find($id);
        $order->final_submit=1;
        $order->update();
        if(auth()->guard('moderator')->check())
            $phone=User::find(auth()->guard('moderator')->user()->user_id);
        else
            $phone=auth()->user()->phone;
        if($order->company_name == null)
        {
            $message = "";
            $message .= " عميلنا العزيز سارع بسداد مبلغ العربون بقيمة " ;
            $message .=  $order->agreements['deposit'] ;
            $message .= "ريال حسب العربون المختار من صفحة الاتفاقات المالية في موقع مارينا الغربية خلال 24 ساعة علما بأن ارقام الحسابات هي ";
            $message .= "مصرف  " .Bank::find($order->bank_id)->bank_name;
            $message .=" رقم الحساب ". Bank::find($order->bank_id)->account_number;
            $message .= " رقم الحساب مع الايبان  ".Bank::find($order->bank_id)->account_number_with ;
            $message .= " إسم المستفيد ". Bank::find($order->bank_id)->name_of_owner;

            $message .= " وأن رقم العقد الخاص بكم هو ";
            $message .= $order['code_number'] ;
            $message .= " وشكرا لحسن اختياركم مارينا";

           // $order->approved = 1;


            session()->flash('success', 'تم تأكيد العقد بنجاح');
            send_sms($message,$phone);
            // return redirect('/');
                				return redirect('/')->with('success',$message );

        }
        else{

			$message = "";
            $message .= " عميلنا العزيز سارع بسداد مبلغ العربون بقيمة " ;
            $message .=   $order['price'] / 100 * 30 ;
            $message .= "ريال حسب العربون المختار من صفحة الاتفاقات المالية في موقع مارينا الغربية خلال 24 ساعة علما بأن ارقام الحسابات هي ";
            $message .= "مصرف الراجحي 240608010213700";

             if(isset($order->bank_id) == 1){
            $message .= "مصرف الراجحي 240608010213700";
            }
            else{
            $message .= "مصرف الأهلي 123456789123456789";

            }

            $message .= $order['code_number'] ;
            $message .= " وشكرا لحسن اختياركم مارينا";

            // $order->approved = 1;
            // $order->update();

            session()->flash('success', 'تم تأكيد العقد بنجاح');
          /*  if(auth()->guard('moderator')->check())
                $phone=User::find(auth()->user()->user_id);
            else
                $phone=auth()->user()->phone;*/
            send_sms($message,$phone);
            // return redirect('/');


                				return redirect('/')->with('success',$message );

        }


    }
    public function music()
    {

        session()->put('music',0);
        return view('booking.personal.music');
    }

    public function both_music()
    {  session()->put('music',1);
        return view('booking.personal.both_music');
    }
    public function no_music()
    { session()->put('music',2);
        return view('booking.personal.no_music');
    }

    public function contract_view(Request $request)
    {

       session()->put('bank_value',  (int)(Bank::find($request->bank_value)->id) );


        return view('booking.personal.contract-view');
    }


	public function resend(){
	     			$msg =  '  كود تسجيلك فى مارينا : ' . session('user_data')['code'];

	                if(send_sms($msg,session('user_data')['sender_phone'])){

                    return view('booking.personal.code_verfiy')->with('userdata', session('user_data'));
}
else{
                return back()  ;
}
	}
	public function send_sms($message,$mobile) {
       $client = new \GuzzleHttp\Client();
    $request = $client->get("http://basic.unifonic.com/wrapper/sendSMS.php?userid=Marinmusic2030@gmail.com&password=Hussain@123&msg=".$message."&sender=MARINA&to=".$mobile."&encoding=UTF8");

    /*    http://api.unifonic.com/wrapper/sendSMS.php?userid=&password=&msg=&sender=&to=&encoding=UTF8*/


    $response = $request->getBody();
   $response =  (explode("<br />",$response));
   return substr($response[0], -1) == "0" ? true : false ;
}
}
