<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Customer extends Authenticatable
{
    use Notifiable;
    //
    protected $fillable= [
        'trainer_id',
        'name',
        'phone',
        'gender',
        'email',
        'address',
        'facebook_link',
        'password',
        'image_profile',
        'balance',
        'pay_password',
        'remark',
        'delete',
        'active',
        'date_sign_up',
        'remember_token',
    ];

    protected $hidden = ['password',  'remember_token','pay_password'];

    public function scopeActivated($q){
        return $q->where('active', 1);
    }

    public function scopeNotDelete($q)
    {
        return $q->where('delete', 0);
    }

    public function numberOfWishListed()
    {
        //Count all items already wish
        $customerId = Auth::guard('customer')->user()->id;
        $countItems = Count(WishList::where(function ($q) use ($customerId) {
            $q->where('customer_id', $customerId);
        })->get());

        return $countItems;
    }

    public function numberOfCartList()
    {
        //Count item in cart
        $customerId = Auth::guard('customer')->user()->id;
        $countItems = Count(CartListDetail::whereHas('cartList',function ($q) use ($customerId) {
            $q->where('customer_id', $customerId);
        })->get());

        return $countItems;
    }

    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
    }

    public function shippings(){
        return $this->hasMany('App\ShippingInformation')->orderBy('id','desc');
    }

    public function scopeSecurePay($q)
    {
        return $q->whereNotNull('pay_password');
    }

}
