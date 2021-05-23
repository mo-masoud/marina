<?php
namespace App\Traits\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Twilio\Rest\Client;

trait SendsPasswordResetEmails
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {


          $userPhone = \App\User::where('phone',$request->mobile)->first();
      
      if(!$userPhone){
          			return back()->with('error', 'هذا الرقم غير مسجل ');

      }
      
                          $token = str_random(64);
            \App\PasswordResets::updateOrCreate(
                ['mobile' => $userPhone->phone,'email' => $userPhone->email],
                ['token' => $token]
            );

                \DB::table('password_resets')
            ->where('mobile', $userPhone->phone)
            ->update(['token' => bcrypt($token)]);
            
$msg  =  "Reset Password Using Link Below \n ". url('password/reset', $token);


            $this->send_sms($msg,$userPhone->phone);
        		session()->flash('info','تم إرسال رابط إسترجاع الباسورد ');

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);
        
    }

    /**
     * Validate the email for the given request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['mobile' => 'required']);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
    
    
    	public function send_sms($message,$mobile) {
       $client = new \GuzzleHttp\Client();
            $request = $client->get("http://api.unifonic.com/wrapper/sendSMS.php?userid=Marinmusic2030@gmail.com&password=Hussain@123&msg=".$message."&sender=MARINA&to=".$mobile.""."encoding=UTF8");
            $response = $request->getBody();
   $response =  (explode("<br />",$response));
      return substr($response[0], -1) == "0" ? true : false ;
}
}
