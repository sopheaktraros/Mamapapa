@extends('backend.layout')
@section('content')
    {{ Form::open(['url' => backUrl('users/update-profile'),'files' => 'true', 'method' => 'patch']) }}
    <section class="p-0 m-0">
        <div class="row">
            <div class="col-sm-8">
                @include('backend.users.profile')
            </div>
        </div>
    </section>
    @component('backend.components.form-footer-fixed')
        <a class="btn btn-danger" href="{{ backUrl('users') }}">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    @endcomponent
    {{ Form::close() }}
@endsection
