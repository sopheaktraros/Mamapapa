@extends('layout')
@section('content')
    <div id="user">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-head">
                        <header>Users</header>

                        <div class="tools">
                            @authorize('user', 'write')
                            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New</a>
                            @endauthorize
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user-table"
                                   class="table table-striped table-bordered table-sm"
                                   data-route="{{ route('users.table') }}"
                                   style="width: 100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .bg-primary, .bg-success, 
        .bg-secondary, .bg-warning {
            border-radius: 3px;
        }
    </style>
@endpush
