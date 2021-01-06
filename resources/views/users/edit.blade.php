@extends('layout')

@section('content')

    {{ Form::open(['route' => ['users.update', $user->id],'files' => 'true', 'method' => 'patch', 'autocomplete' => 'off']) }}

    <div class="row">
        <div class="col-sm-8">
            @include('users.profile')
        </div>
        <div class="col-sm-4">
            @include('users.role')
        </div>

        <div class="col-sm-8">
            @include('users.update-user-password')
        </div>
    </div>

    @component('components.footer')
        <a class="btn btn-light" href="{{ route('users.index') }}"><i class="fas fa-chevron-left"></i> Back</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> Update</button>
    @endcomponent

    {{ Form::close() }}

@endsection
