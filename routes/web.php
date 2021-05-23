<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
 use App\VivaSms\Viva;
 use App\User;
// use Illuminate\Support\Facades\Mail;
Route::get('testsms',function(){
   $message='عزيزي ام  تتم الموافقه على طلب إلغاء الحفل والذي يحمل رقم العقد الخاص بكم ';
                $mobile = User::find(263)->phone;
            //    send_sms($message,$mobile);
            dd("GET");
        
});
 Route::get('test',function(){
     
   
  
    
    $client = new \GuzzleHttp\Client(['base_uri' => 'https://basic.unifonic.com']);
    $response = $client->request('POST', '/wrapper/sendSMS.php',


        [
            "headers" => [
                "Authorization" => "Basic " . base64_encode('Vmeshal905v@gmail.com' . ':' . 'Meshal905)'),
                'BasicAuthUserName' => 'Meshal905)',
                'Accept' => 'application/json'],
            'form_params' => [
                "appsid" => "OzlJ86LOFmgI1dSUPGAkdIF9H4Vpjd",
                "msg" =>'dfsdsdf',
                "sender" => "Marin",
                "to" =>'966543995879',
                "encoding" => "UTF8"
            ],
        ]);

dd($response);
    $response = $response->getBody();
    
    dd($response);
    $response = (explode("<br />", $response));
    return substr($response[0], -1) == "0" ? true : false;


    //return true;

 });

     Route::get('send/{message}/{phone}'   , function($message,$phone) {
      $client = new \GuzzleHttp\Client();
      $request = $client->get("http://api.unifonic.com/wrapper/sendSMS.php?userid=Marinmusic2030@gmail.com&password=Hussain@123&msg=".$message."&sender=MARINA&to=".$phone."&encoding=UTF8");
      $response = $request->getBody();
  $response =  (explode("<br />",$response));
     // return substr($response[0], -1) == "0" ? true : false ;
});

Route::group(['prefix' => 'admin'], function () {

    Route::get('orders/closed'   , 'VoyagerOrdersController@closed');
    Route::get('orders/canceled'   , 'VoyagerOrdersController@canceled');
    Route::get('singer/male'   , 'Voyager\UserController@singer_male');
      Route::get('singer/female'   , 'Voyager\UserController@singer_famale');
	Voyager::routes();
	Route::post('users',['uses' => 'Voyager\UserController@store',  'as' => 'voyager.users.store']);
	Route::get('users',['uses' => 'Voyager\UserController@index',  'as' => 'voyager.users.index']);
	Route::get('users/create',['uses' => 'Voyager\UserController@create',  'as' => 'voyager.users.create']);
        Route::get('view/order/{order_id}','VoyagerOrdersController@print_order')->name('view.order')->middleware('admin.user');

});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/resend/auth', 'Auth\RegisterController@resend');
Route::get('/resend/company', 'BookingCompaniesController@resend');
Route::get('/resend/personal', 'BookingController@resend');
Route::get('/resend/singer', 'BookingSingerController@resend');
Route::get('a', function(){
    return \App\Nationality::get();
});
Route::get('mobily-balance', function(){
  $mobily  = new Mobily();
    return $mobily->balance();
});

Route::get('viva-balance', function(){
    return Viva::Balance();
});
Route::get('route/clear', function(){
        \Artisan::call('route:clear');
});
Route::get('config/clear', function(){
        \Artisan::call('config:clear');
});

Route::get('viva-send-test', function(){
  $viva = new Viva();
    return $viva->send('966548215160','test new  message');
});


Route::get('confirm/order/{id}', 'BookingController@order_confirm');
Route::get('/moderator/confirm/order/{id}', 'BookingController@moderator_confirm_order');



Route::get('/messages/messageform/manger/{id}', 'MessageController@messageform_manger')->name('message.manger')->middleware('auth:web,moderator');







/*
|--------------------------------------------------------------------------
 ****	you Can find All Routes in this path : App\Http\helper.php
|--------------------------------------------------------------------------
 */

PersonsRoute();
CompaniesRoutes();
SingerRoutes();


Route::post("user/login",'Auth\LoginController@loginNormal')->name('loginNormal');


Route::post('contract/find', 'OrdersController@find');

Route::post('state','GetStateCityController@state')->name('state');
Route::post('city','GetStateCityController@city')->name('city');
// addGroom
Route::get('addGroom/{code_number}', 'OrdersController@addGroom');
Route::post('addGroom/{code_number}', 'OrdersController@addGroomPost');
// delay
Route::get('delay/{code_number}', 'OrdersController@delay');
Route::post('delay/{code_number}', 'OrdersController@delayPost');

// close
Route::get('close/{code_number}', 'OrdersController@close');
Route::post('close/{code_number}', 'OrdersController@closePost');

// close
Route::get('cancel/{code_number}', 'OrdersController@cancel');
Route::post('cancel/{code_number}', 'OrdersController@cancelPost');

// print
Route::get('contract/print', 'OrdersController@print');
Route::post('contract/print', 'OrdersController@printPost');
Route::get('contract/print/{code_number}', 'OrdersController@printShow')->middleware('auth:web');
Route::get('contract/print-singer/{code_number}', 'OrdersController@print_singer')->middleware('auth:web');
Route::resource('contract', 'OrdersController');
//orders
Route::post('orders/update/{id}', 'OrdersController@update')->middleware('auth:web,moderator');
Route::post('orders/delete/{id}', 'OrdersController@destroy')->middleware('auth:web,moderator');

Route::post('DeleteOrder/{id}', 'OrdersController@DeleteOrder')->name('DeleteOrder');





        Route::get('view/order/{order_id}','VoyagerOrdersController@print_order')->middleware('auth:web,moderator');


Route::get('/messages', 'MessageController@index')->middleware('auth:web,moderator');
Route::get('/messages/{name?}', 'MessageController@list')->middleware('auth:web,moderator');
Route::get('/my-messages', 'MessageController@MyMessages')->middleware('auth:web,moderator');
Route::get('/messageshow/{message_id}', 'MessageController@show')->middleware('auth:web,moderator');
Route::post('/messages/messageform', 'MessageController@messageform')->middleware('auth:web,moderator');
Route::post('/messages/store', 'MessageController@store')->middleware('auth:web,moderator')->name('messageStore');

Route::get('/foo', function () {
Artisan::call('storage:link');
});
// user
Route::get('/my-orders', 'UserController@myorders');
Route::get('/notifications', 'UserController@notifications');
Route::get('/invoices', 'UserController@invoices');
Route::get('/invoice/{id?}', 'UserController@invoice');

// moderator
Route::get('/moderator/order/{id}', 'OrdersController@showModeratorsOrder')->middleware('auth:web,moderator');
Route::post('/sendCode/{id}', 'OrdersController@SendCodeToUser')->middleware('auth:web,moderator');



Route::get('/complains', 'ComplainController@index');
Route::post('/complains', 'ComplainController@store');




Route::post('/deleteOrders', 'HomeController@deleteOrders')->name('deleteOrders');



Route::get('clear',function(){
  \Artisan::call('config:clear');
  \Artisan::call('config:cache');
  \Artisan::call('view:clear');
  \Artisan::call('cache:clear');
  \Artisan::call('storage:link');

});

// change lang back-end and front-end
Route::get('lang/{lang}', function ($lang) {
	session()->has('lang') ? session()->forget('lang') : '';
	$lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
	return back();
});


Route::get('delay_order','OrdersController@delay_order')->name('delay_order');
Route::get('close_order','OrdersController@close_order')->name('close_order');
Route::get('cancle_order','OrdersController@cancle_order')->name('cancle_order');

Route::get('approve_order','OrdersController@approve_order')->name('approve_order');



Route::get('home', function () {

	return redirect('/');
});
