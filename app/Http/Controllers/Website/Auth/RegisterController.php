<?php

namespace App\Http\Controllers\Website\Auth;
use App\Customer;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest:customer');
    }

    public function showRegistrationForm() {
        return view('website.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => ['required', 'string', 'max:15', 'unique:customers'],
            'name' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //remember_token can used with api token Auth2.0
        return Customer::create([
            'phone' => phone($data['phone']),
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'date_sign_up' => Carbon::now(),
            'remember_token' => $data['_token'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        //Check phone
        $phone = phone($request->phone);
        if (!$phone) {
            return Redirect::back()
                ->withInput()
                ->withErrors(array('phone' => 'The phone must be at least 9 characters.'));
        }

        if ($this->isCustomer('phone',$phone)) {
            return Redirect::back()
                ->withInput()
                ->withErrors(array('phone' => 'The phone number has already.'));
        }

        $user = $this->create($request->all());
        event(new Registered($user));
        Auth::guard('customer')->login($user,true);

        return $this->registered($request, $user) ?: redirect($this->redirectPath());

    }

    //This method used to redirect into previous url,
    protected function redirectTo()
    {
        if (request()->has('previous')) {
            return base64_decode(request()->get('previous'));
        }
        return $this->redirectTo;
    }

    //Check Customer have already or not, with facebook id or email that get from facebook api and customer has been register;
    function isCustomer($key,$data)
    {
        return Customer::where(function ($q) use ($key,$data){
            $q->Where($key, $data);
        })->first();
    }


}
