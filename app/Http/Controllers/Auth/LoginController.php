<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        // return view('auth.login');
        return view('backend.auth.login');
    }
    public function login(Request $request)
    {
        // $email = $request->get('email');
        // $password = $request->get('password');
        // dd($email);
        // $user = User::where('email', $email)->first();
        // dd($user);
        // if($user->password === bcrypt($password)){
        //     return redirect()->route('backend.dashboard');
        // }else{
        //     dd('sai');
        // }

        // dd($request->all());
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) { //ktra viec request co qua nhieu lan hay ko?
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        // $email = $request->get('email');
        // dd($email);
        // $user = User::where('email', $email)->first();
        // dd($user);

        if ($this->attemptLogin($request)) { //xac thuc nhung thong tin username va password co phu hop hay ko?
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

}
