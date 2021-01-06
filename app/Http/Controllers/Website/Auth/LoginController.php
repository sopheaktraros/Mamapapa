<?php

namespace App\Http\Controllers\Website\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    //Customize the user login
    public function username() {
        return 'phone';
    }

    //Show the login form
    public function showLoginForm() {
        return view('website.auth.login');
    }

    //check the login form
    public function login(Request $request)
    {
        $request['phone'] = phone($request['phone']);
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);

    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    //This method use to redirect into previous url,
    protected function redirectTo()
    {
        if (request()->has('previous')) {
            return base64_decode(request()->get('previous'));
        }
        return $this->redirectTo;
    }
    
}
