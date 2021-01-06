@extends('layout')
@section('content')

    <div id="role">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-head">
                        <header>{{ __('Roles') }}</header>
                        <div class="tools">
                            @authorize('role', 'write')
                            <a href="{{ route('roles.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('New') }}</a>
                            @endauthorize
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $i => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td style="width:80px" class="text-center">
                                        <small class="text-white p-1 {{ $role->active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $role->active ? 'Active' : 'Disabled' }}
                                        </small>
                                    </td>
                                    <td style="width:150px" class="text-center">
                                        @authorize('role', 'write')
                                        <a href="{{ route('roles.edit', $role->id) }}" class='btn btn-default btn-sm' 
                                           style='border: 1px solid #227fc1;' data-title='Edit' data-toggle='tooltip' data-placement='top'>
                                            <i class="far fa-edit text-primary"></i>
                                        </a>
                                        @endauthorize

                                        @authorize('role', 'delete')
                                        {{ Form::open(['route' => [ 'roles.remove', $role->id ], 'method' => 'patch', 'class' => 'delete d-inline']) }}
                                            <button type="button" class="btn btn-sm btn-default" style='border: 1px solid #ef0b0b;'
                                                    data-title='Delete' data-toggle='tooltip' data-placement='top'>
                                                <i class="far text-danger fa-trash"></i>
                                            </button>
                                        {{ Form::close() }}
                                        @endauthorize
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
