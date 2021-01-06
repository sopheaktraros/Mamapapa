{{-- @extends('layouts.app') --}}
@extends('layouts.web')

@section('content')

    <div id="reset">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-3 mx-auto pr-0 pl-4">
                    <div class="container-logo text-center">
                        <a href="/">
                            <img src="/images/Logo/logos.png" class="logo-image" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-5 col-xl-4 mx-auto">
                    <div class="card card-signin my-2">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <span class="label-style">Reset Password</span>
                            </h5>
                            {{ Form::open(['route' => 'password.update','class'=>'form-validate','files' => 'true', 'method' => 'post', 'autocomplete' => 'off']) }}
                                @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group">
                                            <label for="inputPhone">Email</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="inputEmail" name="email"
                                                       value="{{ old('email') }}" placeholder="Enter your email"  required>
                                            </div>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="InputPassword">New Password</label>
                                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="InputPassword" name="password"
                                                   placeholder="Enter new password"  required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group ">
                                            <label for="InputRe-password">Confirm Password</label>
                                            <input type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="InputRe-password" name="password_confirmation"
                                                   placeholder="Re-password">
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
                                    </div>
                                </div>

                                <div class="form-row text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-login col-md-9 col-lg-9 mx-auto">Submit</button>
                                </div>
                                <div class="row mt-2 mb-2">
                                    <span class="col-4">
                                        <hr class="my-2 mb-3">
                                    </span>
                                    <span class="col-4 p-0 label-style text-center">or Sign in</span>
                                    <span class="col-4">
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
                                    <span>Not a member?</span><a class="btn btn-md" href="{{url('/register')}}">Register</a>
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
