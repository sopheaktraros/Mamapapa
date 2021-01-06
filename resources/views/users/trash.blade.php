@extends('backend.layout')
@section('content')
    <div class="card">
        <div class="title">
            <div class="row">
                <div class="col">
                    <span class="float-left">User Trash</span>
                    <div class="col text-right">
                        {{ Form::open(['url' => backUrl('users/empty-trash') , 'method' => 'patch', 'class' => 'delete d-inline']) }}
                        <button type="button" class="btn btn-danger">Empty Trash</button>
                        {{ Form::close() }}
                        <a href="{{ backUrl('users') }}" class="btn btn-primary">Back</a>
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
                    <th>Nickname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $i => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                        <td>{{ $user->nickname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            {{ Form::open(['url' => backUrl('users/restore/' . $user->id), 'method' => 'patch', 'class' => 'd-inline']) }}
                            <button type="submit" class="btn btn-link"><i class="fal fa-sync-alt text-danger"></i></button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
