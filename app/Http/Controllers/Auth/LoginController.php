<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use App\UserGroup;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function username() {
		return 'username';
    }

	/**
	 * The user has been authenticated.
	 *
	 * @param Request $request
	 * @param mixed $user
	 *
	 * @return mixed
	 */
	protected function authenticated(Request $request, $user)
	{
		session(['auth.role' => Role::with('permission', 'userGroup')->where('id', auth()->user()->role_id)->first()]);

		if(! Cache::get('user.groups')) {
			Cache::forever('user.groups', UserGroup::all());
		}

		return redirect($this->redirectTo);
    }
    
    protected function credentials(Request $request)
    {
        $request['active'] = 1;
        $request['delete'] = 0;
        return $request->only($this->username(), 'password', 'active','delete');
    }
}
