<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
            |--------------------------------------------------------------------------
            | Login Controller
            |--------------------------------------------------------------------------
            |
            | This controller handles authenticating users for the application and
            | redirecting them to your home screen. The controller uses a trait
            | to conveniently provide its functionality to your applications.
            |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, User $user)
    {
        return redirect('/');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(\Illuminate\Http\Request $request)
    {

        //   dd($request);
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // This section is the only change
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();

            if ($user->hasRole('singer') && $this->attemptLogin($request)) // Make sure the user is active
            {
                if ($user->approved == 1 && $this->attemptLogin($request)) {
                    // Send the normal successful login response
                    return $this->sendLoginResponse($request);
                } else {
                    // Increment the failed login attempts and redirect back to the
                    // login form with an error message.
                    $this->incrementLoginAttempts($request);
                    return redirect()
                        ->back()
                        ->withInput($request->only($this->username(), 'remember'))
                        ->withErrors(['active' => '?????? ?????????? ???????????? ???? ?????? ?????????????? ']);
                }
            } else
                return redirect()
                    ->back()
                    ->withInput($request->only($this->username(), 'remember'))
                    ->withErrors([
                        $this->username() => [trans('auth.failed')],
                    ]);


            /*
                    if($user->hasRole('singer')&& $this->attemptLogin($request))
                    {  dd('gh');}*/


        }


        /* if ($user->roles == 1&& $this->attemptLogin($request)*/

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    public function loginNormal(\Illuminate\Http\Request $request)
    {

        //   dd($request);
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // This section is the only change
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();

            if ($user->hasRole('user') && $this->attemptLogin($request)) // Make sure the user is active
            {

                // Send the normal successful login response
                return $this->sendLoginResponse($request);

            } else
                return redirect()
                    ->back()
                    ->withInput($request->only($this->username(), 'remember'))
                    ->withErrors([
                        $this->username() => [trans('auth.failed')],
                    ]);


                /*
                        if($user->hasRole('singer')&& $this->attemptLogin($request))
                        {  dd('gh');}*/




        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);

    }


}