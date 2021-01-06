<div class="card">
    <div class="card-body">
        <div class="form-group">
            <strong class="text-primary">Reset password</strong>
        </div>
        <div class="form-group">
            <label for="">Password</label> <span class="text-danger">*</span>
            <input name="password" type="password" placeholder="Password" class="form-control"
                   value="{{ old('password') ? old('password') : '' }}">
            {!!  $errors->has('password') ? showError($errors->first('password')) : ''  !!}
        </div>

        <div class="form-group">
            <label for="">Confirm Password</label> <span class="text-danger">*</span>
            <input name="confirm_password" type="password" placeholder="Confirm Password" class="form-control"
                   value="{{ old('conform_password') ? old('conform_password') : '' }}">
            {!!  $errors->has('conform_password') ? showError($errors->first('conform_password')) : ''  !!}
        </div>

    </div>
</div>