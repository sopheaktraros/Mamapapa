@extends('backend.layout')
@section('content')
    {{ Form::open(['url' => backUrl('users/change-password'),'method' => 'patch']) }}
    <section class="p-0 m-0">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="title">Change Password</div>
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Current password</label> <span class="text-danger">*</span>
                                        <input name="currentPassword" type="password" class="form-control"
                                               value="{{ old('currentPassword') ? old('currentPassword') : '' }}">
                                        {!!  $errors->has('currentPassword') ? showError($errors->first('currentPassword')) : ''  !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">New passowrd</label> <span class="text-danger">*</span>
                                        <input name="newPassword" type="password" class="form-control"
                                               value="{{ old('newPassword') ? old('newPassword') : '' }}">
                                        {!!  $errors->has('newPassword') ? showError($errors->first('newPassword')) : ''  !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Confirm new password</label> <span class="text-danger">*</span>
                                        <input name="confirmNewPassword" type="password" class="form-control"
                                               value="{{ old('confirmNewPassword') ? old('confirmNewPassword') : '' }}">
                                        {!!  $errors->has('confirmNewPassword') ? showError($errors->first('confirmNewPassword')) : ''  !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @component('backend.components.form-footer-fixed')
        <a class="btn btn-danger" href="{{ backUrl('users') }}">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    @endcomponent
    {{ Form::close() }}
@endsection
