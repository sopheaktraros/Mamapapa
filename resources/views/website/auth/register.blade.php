{{-- @extends('layouts.app') --}}
@extends('layouts.web')

@section('content')
    <div id="register">
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
                <div class="col-sm-8 col-md-7 col-lg-5 col-xl-4 mx-auto">
                    <div class="card card-register my-2">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <span class="label-style">Register</span>
                            </h5>
                            {{ Form::open(['route' => 'register','class'=>'form-validate', 'method' => 'post', 'autocomplete' => 'off']) }}
                            @csrf
                            <div class="form-row">
                                <div class="col-md-10 mx-auto">

                                    <div class="form-group">
                                        <label for="name">Your name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name"
                                               value="{{ old('name') }}" placeholder="Enter your real name"  required>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone Number</label><span class="text-danger">*</span>
                                        <div class="input-group">
                                            <input type="tel" class="form-control format-phone {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone"
                                                   value="{{ old('phone') }}" placeholder="Enter new phone"  required>
                                        </div>
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label><span class="text-danger">*</span>
                                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password"
                                               placeholder="Enter new password"  required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group ">
                                        <label for="retype-password">Re-type Password</label><span class="text-danger">*</span>
                                        <input type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="retype-password" name="password_confirmation"
                                               placeholder="Re-type your password">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        @if (Request::has('wishlist'))
                                            <input type="hidden" name="previous" value="{{ Request::get('wishlist') }}">
                                        @elseif(Request::has('carts'))
                                            <input type="hidden" name="previous" value="{{ Request::get('carts') }}">
                                        @endif
                                    </div>
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember" checked hidden>
                                </div>
                            </div>
                            <div class="form-row text-center">
                                <button type="submit" class="btn btn-primary btn-register col-md-9 col-lg-9 mt-2 mx-auto">Create Account</button>
                            </div>
                            <div class="row mt-2 mb-2">
                                <span class="col-4">
                                    <hr class="my-2 mb-3">
                                </span>
                                <span class="col-4 label-style text-center">or</span>
                                <span class="col-4">
                                    <hr class="my-2 mb-3">
                                </span>
                            </div>
                            <div class="form-row text-center connect-social">
                                <ul class="col-6 social-network social-circle m-auto">
                                    <li><a href="{{url('login/facebook')}}" class="icoFacebook" title="Register with facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{url('login/google')}}" class="icoGoogle" title="Register with google"><i class="fab fa-google"></i></a></li>
                                </ul>
                            </div>
                            <hr class="my-2 mt-3">
                            <span class="btn-sign-in ml-0 d-block text-center">
                                <span>Do you have account?</span><a class="btn btn-md" href="{{url('/login')}}">Sign in</a>
                            </span>
                            <span class="home-back ml-0 d-block text-center">
                                <a class="btn btn-md" href="{{url('/')}}">{{ setting('app_name') }}</a>
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
            background-color: #f8f9fa;
        }
        #header{
            display: none !important;
        }
        .d-footer-none{
            display: none !important;
        }
    </style>
@endpush





