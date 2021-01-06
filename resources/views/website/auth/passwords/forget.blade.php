{{-- @extends('layouts.app') --}}
@extends('layouts.web')

@section('content')
    <div id="forgot">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-3 mx-auto pr-0 pl-3">
                    <div class="container-logo text-center">
                        <a href="/">
                            <img src="/images/Logo/logos.png" class="logo-image" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4 mx-auto">
                    <div class="card card-forgot my-2">
                        <div class="card-body">
                            @if (!session('status'))
                                <h5 class="card-title text-center">
                                    <span class="label-style">{{ active_language() =='en' ? 'Forget Password' : 'ភ្លេចពាក្យសម្ងាត់' }}</span>
                                </h5>
                                {{ Form::open(['route' => 'password.email','class'=>'form-validate','files' => 'true', 'method' => 'post', 'autocomplete' => 'off']) }}
                                @csrf
                                <div class="form-row">
                                    <p class="col-md-10 mx-auto info text-muted mb-2">
                                        {{ active_language() == 'en' ? 'Enter your email associated with your '. setting('app_name'). ' account.' : 'បញ្ចូលអ៊ីម៉ែលរបស់អ្នកដែលបានភ្ជាប់ជាមួយគណនី '. setting('app_name') }}
                                    </p>
                                    <div class="col-md-10 mx-auto">
                                        <div class="form-group">
                                            <label for="email">{{ active_language() == 'en' ? 'Email' : 'អ៊ីម៉ែល' }}</label>
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}"
                                                       id="email" name="email" placeholder="{{ active_language() == 'en' ? 'Enter your email' : 'បញ្ចូលអ៊ីម៉ែលរបស់អ្នក' }}" autofocus>
                                            </div>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-login col-md-9 col-lg-9 mx-auto">Submit</button>
                                </div>
                                {{ Form::close() }}
                                <hr class="my-1 mt-3">
                                <span class="new-member ml-0 d-block text-center">
                                    <span>Not a member?</span><a class="btn btn-md" href="{{url('/register')}}">Register</a>
                                </span>
                                <span class="home-back ml-0 d-block text-center">
                                    <a class="btn btn-md" href="{{url('/')}}">{{ setting('app_name') }}</a>
                                </span>
                            @else
                                <h5 class="card-title text-center">
                                    <span class="label-style">{{ active_language() =='en' ? 'Authentication required' : 'ភ្លេចពាក្យសម្ងាត់' }}</span>
                                </h5>
                                <div class="form-row">
                                    <p class="col-md-12 mx-auto info text-muted mb-2">
                                        {{ active_language() == 'en' ? 'For your security, we need to authenticate your request. We have e-mailed your password reset link! Please check your email now.' : 'បញ្ចូលអ៊ីម៉ែលរបស់អ្នកដែលបានភ្ជាប់ជាមួយគណនី '. setting('app_name') }}
                                    </p>
                                </div>
                                <hr class="my-1 mt-3">
                                <span class="new-member ml-0 d-block text-center">
                                    <span>Have a account?</span><a class="btn btn-md" href="{{url('/login')}}">Login</a>
                                </span>
                                <span class="home-back ml-0 d-block text-center">
                                    <a class="btn btn-md" href="{{url('/')}}">{{ setting('app_name') }}</a>
                                </span>
                            @endif
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

