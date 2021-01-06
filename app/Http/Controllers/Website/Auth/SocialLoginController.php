<?php

namespace App\Http\Controllers\Website\Auth;

use App\Customer;
use App\CustomerSocial;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;


class SocialLoginController extends Controller
{
    /**
     * Redirect the user to the social authentication page.
     *
     * @param $service
     * @return RedirectResponse
     */
    public function redirect($service): ?RedirectResponse
    {
        try{
            if ($service === 'facebook') {
                return Socialite::driver($service)->redirect();
            }

            if ($service === 'google') {
                return Socialite::driver($service)->redirect();
            }

            return redirect('/login');
        }catch ( \InvalidArgumentException $e ){
            return redirect('/login');
        }

    }

    /**
     * Obtain the user information from social.
     *
     * @param $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback($service): \Illuminate\Http\RedirectResponse
    {
        if ( ! request('code') || request('error')) {
            return redirect('login');
        }
        $socialUser = Socialite::driver( $service )->user();

        if ($service === 'facebook'){
            return $this->facebook($socialUser);
        }
        if ($service === 'google'){
            return $this->google($socialUser);
        }
        return Redirect::back();
    }

    /*Create New Account with Facebook*/

    public function facebook($social)
    {
        $customer_social = $this->isSocial($social,'facebook');

        if ($customer_social){
            $credential = Customer::find($customer_social->customer_id);
            if ($customer_social->active===1){
                if ($credential){
                    Auth::guard('customer')->login($credential,true);
                    return redirect()->to('/');
                }
            }else{
                return redirect('customer/phone-number?user='.base64_encode($customer_social->id) .'&&provide=' .base64_encode('facebook'));
            }
        }

        $customer = $this->createCustomer($social);
        $customer_social = $this->createSocial($social,$customer->id);

        return redirect('customer/phone-number?user='.base64_encode($customer_social->id) .'&&provide=' .base64_encode('facebook'));
    }

    /*Create New Account with Google*/

    public function google($social)
    {
        $customer_social = $this->isSocial($social,'google');

        if ($customer_social){
            $credential = Customer::find($customer_social->customer_id);
            if ($customer_social->active===1){
                if ($credential){
                    Auth::guard('customer')->login($credential,true);
                    return redirect()->to('/');
                }
            }else{
                return redirect('customer/phone-number?user='.base64_encode($customer_social->id) .'&&provide=' .base64_encode('google'));
            }
        }

        $customer = $this->createCustomer($social);
        $customer_social = $this->createSocial($social,$customer->id);

        return redirect('customer/phone-number?user='.base64_encode($customer_social->id) .'&&provide=' .base64_encode('facebook'));
    }

    /*
     * Gets the user in our database where the provider ID or email
     * returned matches a user we have stored and active.
    */
    public function isSocial($social,$service)
    {
        return CustomerSocial::where('provider',$service)->where('provide_id',$social->id)->first();
    }

    //Create New Customer
    public function createCustomer($social){
        return Customer::create([
            'name' => $social->name,
            'email'      => $social->email,
            'image_profile'  => $social->avatar,
            'facebook_link' => $social->profileUrl,
            'password' => bcrypt(uniqid('', true)),
            'remember_token' => csrf_token(),
            'date_sign_up' => Carbon::now(),
            'active' => 0,
        ]);

    }

    //Create New Social Connection
    public function createSocial($social,$customer_id){
        return CustomerSocial::create([
            'customer_id' => $customer_id,
            'provide_id'=> $social->id,
            'provide_token' => $social->token,
            'provide_expiresIn' => $social->expiresIn,
            'provider'  => 'facebook',
            'active' => 0,
        ]);
    }

    public function phone_number()
    {
        return view('website.auth.phone');
    }
    public function updatePhone_number($id,$provide,Request $request)
    {
        //Validate input
        $this->validate($request, [
            'phone' => ['required', 'string', 'max:15', 'unique:customers'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        //check format phone
        $phone = phone($request->phone);
        if (!$phone) {
            return Redirect::back()
                ->withInput()
                ->withErrors(array('phone' => 'The phone number must be at least 9 characters.'));
        }

        $hasCustomer = Customer::where('phone',$phone)->first();
        //Check the phone number have been use
        if ($hasCustomer) {
            return Redirect::back()
                ->withInput()
                ->withErrors(array('phone' => 'The phone number have already! Please try another.'));
        }
        //Update Data
        $isCustomerSocial = CustomerSocial::where('id',base64_decode($id))->where('provider',base64_decode($provide))->first();
        $isCustomerSocial->update([
            'active'=> 1
        ]);

        $hasCustomer = Customer::find($isCustomerSocial->customer_id);
        $hasCustomer->update([
            'phone' => $phone,
            'password' => Hash::make($request->password),
            'active'=> 1
        ]);
        Auth::guard('customer')->login($hasCustomer);
        return redirect()->to('/');
    }
}



