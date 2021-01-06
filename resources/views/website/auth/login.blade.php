{{-- @extends('layouts.app') --}}
@extends('layouts.app')

@section('content')

    <div id="login">

        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-3 mx-auto pr-0 pl-4">
                    <div class="container-logo text-center">
                        <a href="/">
                            <img src="{{ url(setting('logo')) }}" class="logo-image" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
                    <div class="card card-signin my-2">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <span class="label-style">Sign in</span>
                            </h5>
                            {{ Form::open(['route' => 'login','class'=>'form-validate','files' => 'true', 'method' => 'post', 'autocomplete' => 'off']) }}
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="phone" class="form-control format-phone {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}"
                                                   id="phone" name="phone" placeholder="Enter your phone number" maxlength="10" autofocus>
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="InputPassword">Password</label>
                                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}"
                                                   id="InputPassword" name="password" placeholder="Enter your password" autofocus>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="row m-0 pt-1 pb-1">
                                            <div class="form-group form-check col-4 pl-4">
                                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                                <label class="form-check-label" for="remember">Remember</label>
                                            </div>
                                            <div class="col-8 text-right p-0">
                                                <span class="forgot-password text-center">
                                                    <a class="btn btn-md pl-3 pr-0 pt-0" href="{{url('/password/reset')}}">Forget Password?</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @if (Request::has('wishlist'))
                                                <input type="hidden" name="previous" value="{{ Request::get('wishlist') }}">
                                            @elseif(Request::has('carts'))
                                                <input type="hidden" name="previous" value="{{ Request::get('carts') }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row text-center">
                                    <button type="submit" class="btn btn-login col-md-9 col-lg-9 mx-auto">Sign in</button>
                                </div>
                                <div class="row mt-2 mb-2">
                                    <span class="col-5">
                                        <hr class="my-2 mb-3">
                                    </span>
                                    <span class="col-2 p-0 label-style text-center">or</span>
                                    <span class="col-5">
                                        <hr class="my-2 mb-3">
                                    </span>
                                </div>
                                <div class="form-row text-center connect-social">
                                    <ul class="col-6 social-network social-circle m-auto">
                                        <li><a href="{{url('login/facebook')}}" class="icoFacebook" title="Sign in with facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{url('login/google')}}" class="icoGoogle" title="Sign in with google"><i class="fab fa-google"></i></a></li>
                                    </ul>
                                </div>
                                <hr class="my-1 mt-3">
                                <span class="new-member ml-0 d-block text-center">
                                    @php
                                        if (Request::has('wishlist')){
                                            $link = '/register?wishlist='. Request::get('wishlist');
                                        }elseif (Request::has('wishlist')){
                                            $link = '/register?wishlist='. Request::get('wishlist');
                                        }
                                        else{
                                            $link = '/register';
                                        }
                                    @endphp
                                    <span>Not a member?</span><a class="btn btn-md btn-register" href="{{url($link)}}">Register</a>
                                </span>
                                <span class="home-back ml-0 d-block text-center">
                                    <a class="btn btn-md" href="{{url('/')}}">MAMAPAPA</a>
                                </span>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        body {
            overflow: auto;
            font-size: 15px;
            background-color: #f8f9fa;
        }
        .card-signin{
            border: 0;
            border-radius: .5rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0,0,0,.22);
            width: 100%;
        }
        #header{
            display: none !important;
        }
        .d-footer-none{
            display: none !important;
        }
        .form-row button.btn-login{
            background-color: #3d0074;
            color: #ffff;
            font-size: 14px;
            border-radius: 5rem;
            letter-spacing: .1rem;
            transition: all .2s;
        }
        .form-row button.btn:hover{
            color: white
        }
        .card-title .label-style{
            text-transform: uppercase;
            color: #500099;
            padding-bottom: 1px;
            font-size: 1.5rem;
        }
        .forgot-password .btn, a.btn-register, span.home-back a {
            color: #500099;
            font-size: 15px;
        }
        .form-group {
            margin-bottom: .5rem;
        }
        .form-control{
            font-size: 15px;
            height: 32px;
        }
        label {
            display: inline-block;
            margin-bottom: .5rem;
            color: #000
        }
        li{
            display: inline;
            margin: 0 5px;
        }
        .social-circle li a {
            display: inline-block;
            position: relative;
            margin: 0 auto;
            border-radius: 50%;
            text-align: center;
            width: 35px;
            height: 35px;
            font-size: 20px;
            color: white;
            line-height: 35px;
        }
        .connect-social .social-circle li a:hover i {
            transform: rotate(1turn);
            transition: all .2s;
        }
        .icoFacebook{
            background-color: #3b5998;
        }
        .icoGoogle{
            background-color: #bd3518;
        }
        
    </style>
@endpush
