<?php
 use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

if (!function_exists('lang')) {
	function lang() {
		if (session('lang') == 'ar') {
			\Config::set('voyager.multilingual.rtl', true);
		} else {
			\Config::set('voyager.multilingual.rtl', false);
		}
		if (session()->has('lang')) {
			return session('lang');
		} else {
			if (auth()->check() && empty(session('lang'))) {
				\Config::set('voyager.multilingual.rtl', true);
				session()->put('lang', 'ar');
				return session('lang');
			}
		}
	}
}

if (!function_exists('Occasions')) {
	function Occasions() {
		return \App\Models\Occasion::orderBy('id', 'desc')->get();
	}
}

if (!function_exists('countries')) {
	function countries() {
		return \App\Models\Country::orderBy('id', 'desc')->get();
	}
}

if (!function_exists('nationalityName')) {
	function nationalityName($id) {
		$name = \App\Nationality::select('name')->where('id',$id)->first();
		return $name->name ;
	}
}

if (!function_exists('cities')) {
	function cities() {
		return \App\Models\City::get();
	}
}

if (!function_exists('states')) {
	function states() {
		return \App\Models\State::get();
	}
}

if (!function_exists('halls')) {
	function halls() {
		return \App\Models\Halls::get();
	}
}

if (!function_exists('conditions')) {
	function conditions() {
		return \App\Models\Condition::get();
	}
}

if (!function_exists('Machines')) {
	function Machines() {
		return \App\Models\Machine::get();
	}
}

if (!function_exists('Rhythms')) {
	function Rhythms() {
		return \App\Models\Rhythms::get();
	}
}

if (!function_exists('prices')) {
	function prices() {
		return \App\Models\Price::get();
	}
}

if (!function_exists('orderdata')) {
	function orderdata($key) {
		if (!empty(session('order_data')[$key])) {
			return session('order_data')[$key];
		} else {
			return old($key);
		}
	}
}

if (!function_exists('companystep1')) {
	function companystep1($key) {
		if (!empty(session('companystep1')[$key])) {
			return session('companystep1')[$key];
		} else {
			return old($key);
		}
	}
}

if (!function_exists('companystep2')) {
	function companystep2($key) {
		if (!empty(session('companystep2')[$key])) {
			return session('companystep2')[$key];
		} else {
			return old($key);
		}
	}
}

if (!function_exists('machine_session')) {
	function machine_session($key) {
		if (!empty(session('machine')[$key])) {
			return session('machine')[$key];
		} else {
			return null;
		}
	}
}

if (!function_exists('rhythms_session')) {
	function rhythms_session($key) {
		if (!empty(session('rhythms')[$key])) {
			return session('rhythms')[$key];
		} else {
			return null;
		}
	}
}

if (!function_exists('agreements')) {
	function agreements($key) {
		if (!empty(session('agreements')[$key])) {
			return session('agreements')[$key];
		} else {
			return null;
		}
	}
}

if (!function_exists('Remittances')) {
	function Remittances($key) {
		if (!empty(session('Remittances')[$key])) {
			return session('Remittances')[$key];
		} else {
			return null;
		}
	}
}

if (!function_exists('contacts')) {
	function contacts($key) {
		if (!empty(session('contacts'))) {
			return session('contacts')[$key];
		} else {
			return null;
		}
	}
}

if (!function_exists('GetModelbyName')) {
	function GetModelbyName($model, $id) {
		if ($model::whereId($id)->first()) {
			return $model::whereId($id)->first()->getTranslatedAttribute('name', session('lang'));
		}
	}
}
/*
get last order id
 */
/*
if (!function_exists('getLastOrder')) {
	function getLastOrder() {
		$lastid = \App\Models\Order::latest()->first();
		if($lastid){
		return $lastid->id + 1;
		}
	}
}*/


if (!function_exists('getLastOrder')) {
    function getLastOrder() {

            return session('order_data')['code_number'];

    }
}



/////// Validate Helper Functions ///////
if (!function_exists('v_image')) {
	function v_image($ext = null) {
		if ($ext === null) {
			return 'image|mimes:jpg,jpeg,png,gif,bmp';
		} else {
			return 'image|mimes:' . $ext;
		}

	}
}

if (!function_exists('PersonsRoute')) {
	function PersonsRoute() {
		Route::get('/booking/marina/book', 'BookingController@index_1');
		Route::get('/booking/marina/{name?}', 'BookingController@index1');
		Route::get('/booking/step2', 'BookingController@index');
		Route::post('/booking/marina/persons', 'BookingController@step1');
		Route::post('/step2', 'BookingController@step2');
		Route::get('/music', 'BookingController@music');
		Route::get('/no_music', 'BookingController@no_music');
        Route::get('/both-music', 'BookingController@both_music');
		//Route::get('/music_no_music', 'BookingController@music_no_music');
		Route::any('/contract_view', 'BookingController@contract_view');
		Route::post('/step3', 'BookingController@step3');
		Route::post('/step4', 'BookingController@step4');
		Route::post('/step5', 'BookingController@step5');
		Route::post('/step6', 'BookingController@step6');
		Route::post('/finalStep/{id}', 'BookingController@finalStep');

	}
}

if (!function_exists('CompaniesRoutes')) {
	function CompaniesRoutes() {
		Route::post('/booking/marina/companies', 'BookingCompaniesController@step1');
		Route::post('/booking/marina/companies/step2', 'BookingCompaniesController@step2post');
		Route::get('/booking/marina/companies/step3', 'BookingCompaniesController@step3');
		Route::post('/booking/marina/companies/step3', 'BookingCompaniesController@step3post');
		Route::get('/booking/marina/companies/step4', 'BookingCompaniesController@step4');
		Route::post('/booking/marina/companies/step4', 'BookingCompaniesController@step4post');
		Route::post('/booking/marina/companies/finalStep/{id}', 'BookingCompaniesController@finalStep');
	}
}

if (!function_exists('SingerRoutes')) {
	function SingerRoutes() {

    // moderator login
    Route::get('moderator-login', 'SingerController@showLoginFormModrator');
    Route::post('moderator-login', ['as'=>'moderator-login','uses'=>'SingerController@loginModrator']);
Route::group(['middlewareGroups' => ['web']], function () {

    Route::get('/singers', 'SingerController@singers');
    Route::get('/register/login', 'SingerController@RegisterOrLogin');
    Route::get('/register/singer', 'SingerController@registerSinger');
    Route::post('/register/singer', 'SingerController@registerSingerPost');

    Route::get('/register/condition/{gender}','SingerController@registerCondition');

    Route::get('/login/singer', 'SingerController@loginSinger');
    Route::post('/login/singer', 'SingerController@loginSingerPost');

    Route::get('/tours', 'SingerController@tours');
    Route::resource('/managers', 'ManagerController')->middleware('singer:web');

		//booking from personal singer
		Route::get('booking/singer_personal/{gender?}', 'BookingSingerController@index');
		Route::post('show/singer/', 'BookingSingerController@book_singer');
		Route::get('show/singer/{singer_id}', 'BookingSingerController@show_singer');
		Route::get('singer/choose/{singer_id}', 'BookingSingerController@choose');

		Route::get('singer/booking', 'BookingSingerController@booking');

		Route::get('singer/persons', 'BookingSingerController@persons');

		Route::post('booking/singer/step1', 'BookingSingerController@step1');

		Route::post('singer/step2', 'BookingSingerController@step2');
		Route::get('singer/music', 'BookingSingerController@music');

    Route::get('singer/both_music', 'BookingSingerController@both_music');
		Route::get('singer/no_music', 'BookingSingerController@no_music');
		Route::get('singer/music_no_music', 'BookingSingerController@music_no_music');
		Route::any('singer/contract_view', 'BookingSingerController@contract_view');
		Route::post('singer/step3', 'BookingSingerController@step3');
		Route::post('singer/step4', 'BookingSingerController@step4');
		Route::post('singer/step5', 'BookingSingerController@step5');
		Route::post('singer/step6', 'BookingSingerController@step6');
		Route::post('singer/finalStep/{id}', 'BookingSingerController@finalStep');
    });

	}
}

function ArabicDate($date) {
    $date = $date != null ? $date : "1441-06-19";
	$date = explode('-',$date);
	$year = $date[0];
	$month = $date[1];
	$day = $date[2];
    // $months = array("Jan" => "01 ", "Feb" => "02", "Mar" => "03", "Apr" => "04", "May" => "05", "Jun" => "06", "Jul" => "07", "Aug" => "08", "Sep" => "09", "Oct" => "10", "Nov" => "11", "Dec" => "12");
    // $your_date = $date; // The Current Date
    // $en_month = date("M", strtotime($your_date));
    // foreach ($months as $en => $ar) {
    //     if ($en == $en_month) { $ar_month = $ar; }
    // }

    // $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    // $replace = array ("", "", "", "", "");
    // $ar_day_format = date('D'); // The Current Day
    // $ar_day = str_replace($find, $replace, $ar_day_format);


    // header('Content-Type: text/html; charset=utf-8');
    // $standard = array("0","1","2","3","4","5","6","7","8","9");
    // $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    // $current_date = $ar_day.' '.date('d').' / '.$ar_month.' / '.date('Y');
    // $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $current_date = $day.' / '.$month.' / '.$year;
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}

function HijiriDate($date) {
    $months = array("Jan" => "01 ", "Feb" => "02", "Mar" => "03", "Apr" => "04", "May" => "05", "Jun" => "06", "Jul" => "07", "Aug" => "08", "Sep" => "09", "Oct" => "10", "Nov" => "11", "Dec" => "12");
    $your_date = $date; // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("", "", "", "", "", "", "");
    $ar_day_format = date('D'); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);


    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
    $current_date = $ar_day.' '.date('d').' / '.$ar_month.' / '.date('Y');
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}

 function send_sms($message,$mobile) {
try {
    
    $client = new \GuzzleHttp\Client(['base_uri' => 'https://basic.unifonic.com']);
    $response = $client->request('POST', '/wrapper/sendSMS.php',


        [
            "headers" => [
                "Authorization" => "Basic " . base64_encode('Marinamusic2030@gmail.com' . ':' . 'Hussein@1980!'),
                'BasicAuthUserName' => 'Hussain@123',
                'Accept' => 'application/json'],
            'form_params' => [
                "appsid" => "eWb2cExbmNGu0SOAcH89YJk6hA7NNq",
                "msg" => $message,
                "sender" => "Marin",
                "to" => $mobile,
                "encoding" => "UTF8"
            ],
        ]);

    $response = $response->getBody();
    $response = (explode("<br />", $response));
    return substr($response[0], -1) == "0" ? true : false;


    //return true;
}
catch(Exception $exception){
return "<h1>يوجد مشكله فى خدمه الرسائل unifonic يرجى التواصل معها</h1>";

}
}

 function send_mail($email,$data) {

Mail::to($email)->send(new SendMail($data['title'],$data['content'],$data['target']));

}



//higiry date convertion


function intPart($float)
{
    if ($float < -0.0000001)
        return ceil($float - 0.0000001);
    else
        return floor($float + 0.0000001);
}

function Hijri2Greg($day, $month, $year, $string = false)
{
    $day   = (int) $day;
    $month = (int) $month;
    $year  = (int) $year;

    $jd = intPart((11*$year+3) / 30) + 354 * $year + 30 * $month - intPart(($month-1)/2) + $day + 1948440 - 385;

    if ($jd > 2299160)
    {
        $l = $jd+68569;
        $n = intPart((4*$l)/146097);
        $l = $l-intPart((146097*$n+3)/4);
        $i = intPart((4000*($l+1))/1461001);
        $l = $l-intPart((1461*$i)/4)+31;
        $j = intPart((80*$l)/2447);
        $day = $l-intPart((2447*$j)/80);
        $l = intPart($j/11);
        $month = $j+2-12*$l;
        $year  = 100*($n-49)+$i+$l;
    }
    else
    {
        $j = $jd+1402;
        $k = intPart(($j-1)/1461);
        $l = $j-1461*$k;
        $n = intPart(($l-1)/365)-intPart($l/1461);
        $i = $l-365*$n+30;
        $j = intPart((80*$i)/2447);
        $day = $i-intPart((2447*$j)/80);
        $i = intPart($j/11);
        $month = $j+2-12*$i;
        $year = 4*$k+$n+$i-4716;
    }

    $data = array();
    $date['year']  = $year;
    $date['month'] = $month;
    $date['day']   = $day;

    if (!$string)
        return $date;
    else
        return     "{$year}-{$month}-{$day}";
}

function Greg2Hijri($day, $month, $year, $string = false)
{
    $day   = (int) $day;
    $month = (int) $month;
    $year  = (int) $year;

    if (($year > 1582) or (($year == 1582) and ($month > 10)) or (($year == 1582) and ($month == 10) and ($day > 14)))
    {
        $jd = intPart((1461*($year+4800+intPart(($month-14)/12)))/4)+intPart((367*($month-2-12*(intPart(($month-14)/12))))/12)-
        intPart( (3* (intPart(  ($year+4900+    intPart( ($month-14)/12)     )/100)    )   ) /4)+$day-32075;
    }
    else
    {
        $jd = 367*$year-intPart((7*($year+5001+intPart(($month-9)/7)))/4)+intPart((275*$month)/9)+$day+1729777;
    }

    $l = $jd-1948440+10632;
    $n = intPart(($l-1)/10631);
    $l = $l-10631*$n+354;
    $j = (intPart((10985-$l)/5316))*(intPart((50*$l)/17719))+(intPart($l/5670))*(intPart((43*$l)/15238));
    $l = $l-(intPart((30-$j)/15))*(intPart((17719*$j)/50))-(intPart($j/16))*(intPart((15238*$j)/43))+29;

    $month = intPart((24*$l)/709);
    $day   = $l-intPart((709*$month)/24);
    $year  = 30*$n+$j-30;

    $date = array();
    $date['year']  = $year;
    $date['month'] = $month;
    $date['day']   = $day;

    if (!$string)
        return $date;
    else
        return     "{$year}-{$month}-{$day}";
}

























