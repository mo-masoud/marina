<?php

namespace App\Http\Controllers;
use App\VivaSms\Viva;
use abdullahobaid\mobilywslaraval\Mobily;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Remittance;
use App\User;
use Validator;
use Auth;
use App\BankClient;

class BookingCompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {       
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function step1()
    {
        
        $this->validate(request(), [
            'company_type'               => 'required',
            'company_name'               => 'required|string',
            'commercial_registration_no' => 'required|integer',
            'company_owner_name'         => 'required|string',
            'registration_id_number'     => 'required|integer',
            'director_name'              => 'required|string',
        ], [], [
            'company_type'               => trans('front.company_type'),
            'company_name'               => trans('front.company_name'),
            'commercial_registration_no' => trans('front.commercial_registration_no'),
            'company_owner_name'         => trans('front.company_owner_name'),
            'registration_id_number'     => trans('front.registration_id_number'),
            'director_name'              => trans('front.director_name'),
        ]);

        $data = request()->except('_token');
        $data['code_number'] = rand(1000, 9999);
        session()->put('companystep1', $data);
        
        
        
        if(session()->put("provider",1)){
            //
        }
        else{
            session()->put("provider",0);
            
        }
        

        
        $males = User::whereRoleId(4)->whereGender(0)->get();
        $females= User::whereRoleId(4)->whereGender(1)->get();

        if (session('singer') == null) {
            $singer = null;
        } else {
            $singer = session('singer');
        }
        $countries = \App\Models\Country::orderBy('id', 'desc')->get();
        return view('booking.companies.companystep2', compact('males', 'females', 'singer','countries'));
    }

    public function step2post()
    {
        $validator = Validator::make(request()->all(), [
            'country_id'    => 'required',
            'city_id'       => 'required',
            'state_id'      => 'required',
            'street_name'   => 'required',
            'hejry_date'    => 'required',
            'date'          => 'required',
            'singer_gender' => 'required',
            'start_time'    => 'required',
            'end_time'      => 'required',
            'price'         => 'required',
            'concert'       => 'required',
            'permits'       => 'required',
            'time_of_working' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $data = request()->except('_token');

            if (request()->get('singer_gender') == 'male') {
                $singer = '';
                if (session('singer') == null) {
                    $singer = User::findOrFail(request()->get('singer_male_id'));
                } else {
                    $singer = User::findOrFail(session('singer')->id);
                }
                $data['singer_name_male'] = $singer->name;
                $data['singer_name_female'] = null;
                $data['singer_id'] = $singer->id;
            } else {
                $singer = '';
                if (session('singer') == null) {
                    $singer = User::findOrFail(request()->get('singer_female_id'));
                } else {
                    $singer = User::findOrFail(session('singer')->id);
                }
                $data['singer_name_female'] = $singer->name;
                $data['singer_name_male'] = null;
                $data['singer_id'] = $singer->id;
            }
        
            session()->put('companystep2', $data);
            
            return redirect('booking/marina/companies/step3');
        }
    }

    public function step3()
    {
        $conditions = '';
        if (session('singer') == null) {
            $conditions = \App\ConditionCompany::orderBy('created_at','DESC')->get();
        } else {
            if (session('companystep2')['singer_gender'] == 'female') {
                $conditions = \App\ConditionFsingerCompany::where('user_id', session('singer')->id)->get();
            } else {
                $conditions = \App\ConditionMsingerCompany::where('user_id', session('singer')->id)->get();
            }
        }

        if($conditions->isNotEmpty())
        {

            session()->put('conditions',$conditions);
            return view('booking.companies.contract', compact('conditions'));
        }

        else
        {

            $bankClients = BankClient::all();
            return view('booking.companies.conversions',compact('bankClients'));}
    }

    public function step3post()
    {

$conditions=session()->get('conditions');

        if(count(session()->get('conditions'))!=count(request()->condition) && request()->agree!='on')
            /*$validator = Validator::make(request()->all(), [
                'condition.*' => 'required',
                'condition.*' => 'accepted',
                'agree'       => 'required',
            ]);*/

            /*if ($validator->fails()) */{

            return view('booking.companies.contract',compact("conditions"))->withErrors('يجب الموافقه ع جميع الشروط');

        }
        if(count(session()->get('conditions'))==count(request()->condition) || request()->agree=='on')


        {
            $bankClients = BankClient::all();
            return view('booking.companies.conversions',compact('bankClients'));
        }


        /*validator = Validator::make(request()->all(), [
            'condition.*' => 'required',
            'condition.*' => 'accepted',
            'agree'       => 'required',
        ], [
            'agree'     => trans('front.agree'),
            'condition' => trans('front.condition'),
        ]);

        if ($validator->fails()) {
            return view('booking.companies.contract')->withErrors($validator);
        } else {
         $bankClients = BankClient::all();
         return view('booking.companies.conversions',compact('bankClients'));
        }*/
    }
    
     public function step4()
    {

         $bankClients = BankClient::all();
         return view('booking.companies.conversions',compact('bankClients'));
    }
    
    public function step4post()
    {

        // first check if request has code or not
        $data = [];
        if (request('sender_code')) {
            $validator = Validator::make(request()->all(), [
                'sender_code' => 'required',
            ], [
                'sender_code' => trans('front.sender_code'),
            ]);
     
            if (request('sender_code') == session('companystep3')['code']) {

                if ($validator->fails()) {
                    return back()->withErrors($validator);
                } else {
                    return view('booking.companies.contract-view');
                }
            } else {
                session()->flash('error', 'كود التحقق غير صحيح');
                return view('booking.companies.code_verfiy')->with('companystep3', session('companystep3'));
            }
        } else {
            // if request havn't request_code that mean user still typing his info so make a sms to verfiy phone

            $validator = Validator::make(request()->all(), [
                'sender_name'       => 'required',
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
                 $data['code'] = rand(1000, 9999); 
                //generate random code
                    session()->put('code_number',$data['code']);
                $msg = 'كود التحقق فى مارينا الغربية : ' . $data['code'];

            if(send_sms($msg,auth()->user()->phone)){
                        session(['companystep3' => $data]);
                        session()->flash('success', 'تم إرسال الكود بنجاح');
    
                        return view('booking.companies.code_verfiy')->with('companystep3', session('companystep3'));
                }else{
                        session()->flash('error', 'Wrong Mobile Number');
    
                        return view('booking.companies.conversions')->with('companystep3', session('companystep3'));
                }
            }
        }
    }

    public function finalStep($id)
    {

        $companystep1 = session('companystep1');
        $companystep2 = session('companystep2');
        $Remittances = session('Remittances');

        $start_time = Carbon::parse($companystep2['start_time'])->format('H:i');
        $end_time   = Carbon::parse($companystep2['end_time'])->format('H:i');
        
        $date = str_replace('/', '-', $companystep2['date']);
        $date = str_replace(' ', '', $date);
        $hejry_date = str_replace('/', '-', $companystep2['hejry_date']);
        $hejry_date = str_replace(' ', '', $hejry_date);

        if ($companystep1 != null && $companystep2 != null) {
            $data = [
                'company_type'               => $companystep1['company_type'],
                'company_name'               => $companystep1['company_name'],
                'commercial_registration_no' => $companystep1['commercial_registration_no'],
                'company_owner_name'         => $companystep1['company_owner_name'],
                'registration_id_number'     => $companystep1['registration_id_number'],
                'director_name'              => $companystep1['director_name'],
                'code_number'                => $companystep1['code_number'],
                'hejry_date'                 => Carbon::parse($hejry_date),
                'date'                       => Carbon::parse($date),
                'start_time'                 => $start_time,
                'end_time'                   => $end_time,
                'street_name'                => $companystep2['street_name'],
                'user_id'                    => auth()->user()->id,
                'country_id'                 => $companystep2['country_id'],
                'city_id'                    => $companystep2['city_id'],
                'state_id'                   => $companystep2['state_id'],
                'concert'                    => $companystep2['concert'],
                'price'                      => $companystep2['price'],
                'order_type'                 => 'companies',
                'permits'                    => $companystep2['permits'] ?$companystep2['permits']  :"تصريح من الإمارة2",
                'singer_gender'              => $companystep2['singer_gender'],
                'singer_id'					 => $companystep2['singer_id'],
                'approved'		    => request('status') ?? 0,
                'music'=>session()->get('music'),
                'final_submit'=>$id,
                'day'=>$companystep2['day']

            ];

            
                    
            if(session('singer')!= null){
              $data['singer_gender'] = session('singer')->gender ;  
            }
            if ($companystep2['singer_name_female'] != null && $companystep2['singer_gender'] == 'female') {
                $data['singer_name']          = $companystep2['singer_name_female'];
                $data['singer_name_optional'] = $companystep2['singer_name_optional_female'];
            } else {
                $data['singer_name']          = $companystep2['singer_name_male'];
                $data['singer_name_optional'] = $companystep2['singer_name_optional_male'];
            }

            $checkOrder = Order::where('code_number',$companystep1['code_number'])->first();
            if ($checkOrder) {
                return redirect('/')->with('error', 'لقد تم تسجيل العقد من قبل');
            }
            
            if(session()->get('company_r_type')== 'singer'){
                session()->put("provider",0);
                
                
            }else{
                session()->put("provider",1);
            }
            
            
            $data['provided_by_marina']=session()->get('provider');
            //dd($companystep2['singer_gender'],$data['provided_by_marina']);

            
            
             $order = Order::create($data);
            
            $Remittances['order_id'] = $order->id;
            // store remittances
            Remittance::create($Remittances);
            
            // send sms to user
            /*
                $viva  = new Viva();
    			$message = "";
                $message .= " عميلنا العزيز سارع بسداد مبلغ العربون بقيمة " ;
                $message .=   $companystep2['price'] / 100 * 30 ;
                $message .= "ريال حسب العربون المختار من صفحة الاتفاقات المالية في موقع مارينا الغربية خلال 24 ساعة علما بأن ارقام الحسابات هي ";
                $message .= "مصرف الراجحي 240608010213700";
                $message .= "مصرف الأهلي 123456789123456789";
                $message .= " وأن رقم العقد الخاص بكم هو ";
                $message .= $companystep1['code_number'] ;
                $message .= " وشكرا لحسن اختياركم مارينا .";
    
    			$viva->send(auth()->user()->phone, $message);
                $this->send_sms($message,auth()->user()->phone); 
            */
            
            
            
            if($order->approved == 2){
              //  $message = 'عزيزي العميل شكرا لاختياركم موقع مارينا الغربية نامل اكمال حجزكم خلال 48 ساعه من الدخول مره اخرة وعمل حفظ نهائي للعقد رقم '.$order->code_number;
                                $message = 'عزيزي العميل لقد تم حفظ بياناتك وحجزكم مبدئياً. نامل اتمام حجزكم في اسرع وقت ممكن قبل حضور عميل اخر ويتم إلغاء حجزكم ورقم العقد هو  '.$order->code_number;
                send_sms($message,auth()->user()->phone);
            }
            elseif($order->approved == 0){
                $message  = "السادة " ;
                $message .= $companystep1['company_name'];
                $message .= " لقد تم تأكيد حفلكم الكريم بموقع مارينا الغربيه لدي " ;
                $message .= $companystep2['singer_gender'] == 'female' ? " الفنانة " : "  الفنان  " ;
                $message .= User::find($companystep2['singer_id'])->name ;
                $message .= " برقم العقد   " ; 
                $message .= $companystep1['code_number'] ;
                $message .= " شاكرين ومقدرين حسن تعاونكم معنا " ;
                send_sms($message,auth()->user()->phone);
            }

            

            // Save To The Log Activity For Singer Notifications
            // Caused By Here Not The Cause But The Singer That Is Caused By
            activity()->performedOn($order)->causedBy($order->singer_id)->log('يوجد حجز جديد بعقد رقم :subject.code_number من قبل العميل '.Auth::user()->name);
 

            // destroy all session after save data
            session()->forget('companystep1');
            session()->forget('companystep2');
            session()->forget('companystep3');
            session()->forget('Remittances');
            session()->forget('singer_id');
            session()->forget('singer');

            // redirect user to his orders
            session()->flash('success', 'تم عمل الحجز بنجاح');
            return redirect('/');
        } else {
            return redirect('/')->with('error', 'fill your data first to make order');
        }
    }

	public function resend(){
	    $msg =  '  كود تحقق  مارينا : ' . session('companystep3')['code'];
	    if(send_sms($msg,session('companystep3')['sender_phone'])){
            return view('booking.companies.code_verfiy')->with('companystep3', session('companystep3'));
        }else{
            return back() ;
        }
	}

    public function send_sms($message,$mobile) {
           $client = new \GuzzleHttp\Client();
        $request = $client->get("http://basic.unifonic.com/wrapper/sendSMS.php?userid=Marinmusic2030@gmail.com&password=Hussain@123&msg=".$message."&sender=MARINA&to=".$mobile."&encoding=UTF8");
        $response = $request->getBody();
           $response =  (explode("<br />",$response));
      return substr($response[0], -1) == "0" ? true : false ;
}




}
