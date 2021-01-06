@extends('backend.layout')
@section('content')
    <div class="card">
        <div class="title">
            <div class="row">
                <div class="col">
                    <span class="float-left">Roles Trash</span>
                    <div class="col text-right">
                        {{ Form::open(['url' => backUrl('roles/empty-trash') , 'method' => 'patch', 'class' => 'delete d-inline']) }}
                        <button type="button" class="btn btn-danger">Empty Trash</button>
                        {{ Form::close() }}
                        <a href="{{ backUrl('roles') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $i => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            {{ Form::open(['url' => backUrl('roles/restore/' . $role->id), 'method' => 'patch', 'class' => 'd-inline']) }}
                            <button type="submit" class="btn btn-link"><i class="fal fa-sync-alt text-danger"></i></button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
