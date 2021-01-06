{{-- @extends('layouts.app') --}}
@extends('layouts.web')

@section('content')
    <div id="register">
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
                <div class="col-sm-8 col-md-7 col-lg-5 col-xl-4 mx-auto">
                    <div class="card card-register my-2">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <span class="label-style" style="font-size: 1.3rem;">Your Information</span>
                            </h5>
                            @php
                                if (Request::has('user') && Request::has('provide')){
                                    $user = Request::get('user');
                                    $provide = Request::get('provide');
                                }
                            @endphp
                            {{ Form::open(['url' => route('phone-number',[$user,$provide]),'class'=>'form-validate', 'method' => 'PUT', 'autocomplete' => 'off']) }}
                            @csrf
                            <div class="form-row">
                                <div class="col-md-10 mx-auto">
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
                                </div>
                            </div>
                            <div class="form-row text-center">
                                <button type="submit" class="btn btn-primary btn-register col-md-9 col-lg-9 mt-2 mx-auto">Next</button>
                            </div>
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





