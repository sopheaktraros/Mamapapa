@extends('layouts.app')

@section('content')

    <div class="layout-container">
        <div class="page-container bg-blue-grey-900">
            <div class="d-flex align-items-center align-items-center-ie bg-cover">
                <div class="fw">
                    <div class="container container-xs">
                        <form class="cardbox cardbox-flat text-white form-validate text-color" method="POST"
                              action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="cardbox-heading">
                                <div class="cardbox-title text-center">Delivery Tracking Management</div>
                            </div>
                            <div class="cardbox-body">
                                <div class="px-5">
                                    <div class="form-group">
                                        <input
                                                class="form-control form-control-inverse {{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                type="text" name="username" value="{{ old('username') }}" required autofocus
                                                placeholder="{{ __('Username') }}">
                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input
                                                class="form-control form-control-inverse {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                type="password" name="password" required placeholder="{{ __('Password') }}">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-center my-4">
                                        <button class="btn btn-lg btn-gradient btn-oval btn-primary btn-block"
                                                type="submit"> <i class="fa fa-unlock"></i> {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
