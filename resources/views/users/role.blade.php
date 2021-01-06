<?php
$role_id = null;
if ($user) {
	$role_id = $user->role_id;
}
?>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <strong class="text-primary">User role <span class="text-danger">*</span></strong>
        </div>

        @foreach($roles as $role)
            <div class="form-group">
                <label class="radio">{{ $role->name }}
                    <input type="radio" {{ $role_id == $role->id ? 'checked' : '' }} value="{{ $role->id }}" {{ $role->id == 1 ? 'disabled' : '' }} name="role_id">
                    <span class="checkround"></span>
                </label>
            </div>
        @endforeach
    </div>
</div>