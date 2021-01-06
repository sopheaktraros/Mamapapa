@extends('layout')

@section('content')

    <div id="role">
        {{ Form::open(['route' => ['roles.update', $role->id ],'files' => 'true', 'method' => 'patch']) }}

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-head">
                        <header>{{ __('Edit Role') }}</header>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">{{ __('User Group') }}</label> <span class="text-danger">*</span>

                            <select name="user_group_id" id="user_group_id" class="form-control">
                                @foreach($userGroups as $userGroup)
                                    <option {{ $role->user_group_id ==  $userGroup->id ? 'selected' : '' }} value="{{ $userGroup->id }}">{{ $userGroup->name }}</option>
                                @endforeach
                            </select>

                            {!!  $errors->has('user_group_id') ? showError($errors->first('user_group_id')) : ''  !!}
                        </div>

                        <div class="form-group">
                            <label for="">Name</label> <span class="text-danger">*</span>
                            <input name="name" type="text" class="form-control"
                                   value="{{ old('name') ? old('name') : $role->name }}">
                            {!!  $errors->has('name') ? showError($errors->first('name')) : ''  !!}
                        </div>

                        <div class="form-group">
                            <label for="">Remark</label>
                            <textarea class="form-control" name="description" placeholder="Remark"
                                      rows="5">{{ old('description') ? old('description') : $role->description }}</textarea>
                            {!!  $errors->has('description') ? showError($errors->first('description')) : ''  !!}
                        </div>


                        <div class="form-group">
                            <label>Status(Inactive/Active)</label><span class="text-danger">*</span>
                            <div class="can-toggle can-toggle--size-small">
                                <input id="status" type="checkbox" value="1"
                                       {{ $role->active == 1 ? 'checked' : '' }} name="active"/>
                                <label for="status" class="label-switch-status">
                                    <div class="can-toggle__switch" data-checked="Active"
                                         data-unchecked="Inactive"></div>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="text-primary">{{ __('Permissions') }}</label>
                        </div>

                        <div id="table-permissions" class="scroller">
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th>Permission</th>
                                    <th class="text-center">Read</th>
                                    <th class="text-center">Write</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userPermissions as $i => $permission)
                                    @php
                                        $arrPermissionsChoose = $role->permission->toArray();
                                        $isChecked = array_filter($arrPermissionsChoose, function ($permissionChoose) use($permission) {
                                            return $permissionChoose['id'] == $permission->id ;
                                        });

                                        $isCheckedRead = false;
                                        $isCheckedWrite = false;
                                        $isCheckedDelete = false;
                                        if($isChecked) {
                                            $isCheckedRead = array_values($isChecked)[0]['pivot']['read'] == 1;
                                            $isCheckedWrite = array_values($isChecked)[0]['pivot']['write'] == 1;
                                            $isCheckedDelete = array_values($isChecked)[0]['pivot']['delete'] == 1;
                                        }
                                    @endphp

                                    <tr class="bg-blue">
                                        <th style="width: 300px">
                                            <i class="fa fa-plus-circle toggle-sub-permission"
                                               data-id="{{ $permission->id }}"></i>
                                            {{ $permission->label }}
                                        </th>
                                        <td class="text-center">
                                            <input type="hidden" name="permission_id[]" value="{{ $permission->id }}">
                                            @if($permission->read)
                                                <div class="checkbox-custom padding-left-0">
                                                    <label for="check{{ $permission->id }}">
                                                        <input {{ $isCheckedRead ? 'checked' : '' }} id="check{{ $permission->id }}"
                                                               type="checkbox" name="permission_read[]"
                                                               value="{{ $permission->id }}" class="parent"/>
                                                        <span class="position-relative"></span>
                                                    </label>
                                                </div>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if($permission->write)
                                                <div class="checkbox-custom padding-left-0">
                                                    <label for="check{{ $permission->id }}-second">
                                                        <input {{ $isCheckedWrite ? 'checked' : '' }} id="check{{ $permission->id }}-second"
                                                               type="checkbox" name="permission_write[]"
                                                               value="{{ $permission->id }}" class="parent"/>
                                                        <span class="position-relative"></span>
                                                    </label>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($permission->delete)
                                                <div class="checkbox-custom padding-left-0">
                                                    <label for="check{{ $permission->id }}-third">
                                                        <input {{ $isCheckedDelete ? 'checked' : '' }} id="check{{ $permission->id }}-third"
                                                               type="checkbox" name="permission_delete[]"
                                                               value="{{ $permission->id }}" class="parent"/>
                                                        <span class="position-relative"></span>
                                                    </label>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>

                                    @foreach($permission->children as $subPermission)
                                        @php
                                            $isCheckedChild = array_filter($arrPermissionsChoose, function ($permissionChoose) use($subPermission) {
                                                return $permissionChoose['id'] == $subPermission->id;
                                            });

                                            $isCheckedChildRead = false;
                                            $isCheckedChildWrite = false;
                                            $isCheckedChildDelete = false;
                                            if($isCheckedChild) {
                                                $isCheckedChildRead = array_values($isCheckedChild)[0]['pivot']['read'] == 1;
                                                $isCheckedChildWrite = array_values($isCheckedChild)[0]['pivot']['write'] == 1;
                                                $isCheckedChildDelete = array_values($isCheckedChild)[0]['pivot']['delete'] == 1;
                                            }
                                        @endphp

                                        <tr data-parent="{{ $permission->id }}">
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $subPermission->label }}</td>
                                            <td class="text-center">
                                                <input type="hidden" name="permission_id[]"
                                                       value="{{ $subPermission->id }}">
                                                @if($subPermission->read)
                                                    <div class="checkbox-custom padding-left-0">
                                                        <label for="check{{ $subPermission->id }}">
                                                            <input {{ $isCheckedChildRead ? 'checked' : '' }} id="check{{ $subPermission->id }}"
                                                                   type="checkbox" name="permission_read[]"
                                                                   value="{{ $subPermission->id }}"/>
                                                            <span class="position-relative"></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($subPermission->write)
                                                    <div class="checkbox-custom padding-left-0">
                                                        <label for="check{{ $subPermission->id }}-second">
                                                            <input {{ $isCheckedChildWrite ? 'checked' : '' }} id="check{{ $subPermission->id }}-second"
                                                                   type="checkbox" name="permission_write[]"
                                                                   value="{{ $subPermission->id }}"/>
                                                            <span class="position-relative"></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($subPermission->delete)
                                                    <div class="checkbox-custom padding-left-0">
                                                        <label for="check{{ $subPermission->id }}-third">
                                                            <input {{ $isCheckedChildDelete ? 'checked' : '' }} id="check{{ $subPermission->id }}-third"
                                                                   type="checkbox" name="permission_delete[]"
                                                                   value="{{ $subPermission->id }}"/>
                                                            <span class="position-relative"></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @component('components.footer')
            <a class="btn btn-danger" href="{{ route('roles.index') }}"><i class="fas fa-chevron-left"></i> Back</a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> Update</button>
        @endcomponent

        {{ Form::close() }}
    </div>

@endsection