<?php
$name = null;
$email = null;
$username = null;
$active = 1;
$title = 'New user';
if ($user) {
	$name = $user->name;
	$email = $user->email;
	$username = $user->username;
	$active = $user->active;
	$title = 'Edit user';
}
?>

<div class="card">
    <div class="card-head">
        <header>{{ __($title) }}</header>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">Name</label> <span class="text-danger">*</span>
            <input name="name" type="text" class="form-control" placeholder="Name"
                   value="{{ old('name') ? old('name') : $name }}">
            {!!  $errors->has('name') ? showError($errors->first('name')) : ''  !!}
        </div>

        <div class="form-group">
            <label for="">Username</label> <span class="text-danger">*</span>
            <input name="username" type="text" class="form-control" placeholder="Username"
                   value="{{ old('username') ? old('username') : $username }}">
            {!!  $errors->has('username') ? showError($errors->first('username')) : ''  !!}
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input name="email" type="email" placeholder="Email" class="form-control"
                   value="{{ old('email') ? old('email') : $email }}">
        </div>

        @if (empty($user))

            <div class="form-group">
                <label for="">Password</label> <span class="text-danger">*</span>
                <input name="password" type="password" placeholder="Password" class="form-control"
                       value="{{ old('password') ? old('password') : '' }}">
                {!!  $errors->has('password') ? showError($errors->first('password')) : ''  !!}
            </div>

            <div class="form-group">
                <label for="">Confirm Password</label> <span class="text-danger">*</span>
                <input name="confirm_password"  placeholder="Confirm Password" type="password" class="form-control"
                       value="{{ old('confirm_password') ? old('confirm_password') : '' }}">
                {!!  $errors->has('confirm_password') ? showError($errors->first('confirm_password')) : ''  !!}
            </div>

        @endif

        <div class="form-group">
            <label>Status(Inactive/Active)</label><span class="text-danger">*</span>
            <div class="can-toggle can-toggle--size-small">
                <input id="status" type="checkbox" value="1" {{ $active == 1 ? 'checked' : '' }} name="active"/>
                <label for="status" class="label-switch-status">
                    <div class="can-toggle__switch" data-checked="Active" data-unchecked="Inactive"></div>
                </label>
            </div>
        </div>
    </div>
</div>