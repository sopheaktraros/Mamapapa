@extends('layout')

@section('content')
    {{ Form::open(['route' => 'users.store','files' => 'true', 'method' => 'post', 'autocomplete' => 'off']) }}
    <section class="p-0 m-0">
        <div class="row">
            <div class="col-sm-8">
                @include('users.profile')
            </div>
            <div class="col-sm-4">
                @include('users.role')
            </div>
        </div>
    </section>

    @component('components.footer')
        <a class="btn btn-light" href="{{ route('users.index') }}">Back</a>
        <button type="submit" class="btn btn-primary">Create</button>
    @endcomponent

    {{ Form::close() }}
@endsection
