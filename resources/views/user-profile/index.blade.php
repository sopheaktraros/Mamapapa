@extends('layout')
@section('content')
    <div id="user-profile">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-head">
                        <header>Profile</header>
                    </div>
                    <div class="card-body">
                    {{ Form::open(['url' => url('user-profile/'.$profile->id), 'files' => 'true', 'id' => 'form-validation','autocomplete' => 'off', 'method' => 'put']) }}
                        {{-- <div class="form-group">
                            <label>Full Name</label>
                            <span class="form-control">{{$profile->name}}</span> 
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <span class="form-control">{{$profile->username}}</span> 
                        </div>
                        <div class="form-group">
                            <label>Balance ($)</label>
                            <span class="form-control">{{$profile->balance}}</span> 
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <span class="form-control">{{$profile->email}}</span> 
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <span class="form-control">{{$profile->role->name}}</span> 
                        </div> --}}

                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-lg-2 text-center">
                                <img id="profile-image" src="{{ url('images/website/default-image.jpg') }}"
                                     alt="Profile">
                                <h4>{{ $profile->name }}</h4>
                                <input type="hidden" class="user-id" name="user_id" value="{{ $profile->id }}">
                            </div>
                            <div class="col-md-10 col-sm-10 col-lg-10">
                                <table class="table table-sm table-striped mt-3">
                                    <tbody>
                                    @if(auth()->user()->id != "1")
                                    <tr>
                                        <td><span class="font-weight w-15">Balance</span></td>
                                        <td class="w-35">${{ $profile->balance }} </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td><span class="font-weight w-15">Username:</span></td>
                                        <td class="w-35">{{ $profile->username }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-weight w-15">Role:</span></td>
                                        <td class="w-35">{{ $profile->role->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-weight w-15">Email:</span></td>
                                        <td class="w-35">{{ $profile->email }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if(auth()->user()->id != "1")
                        <button type="button" class="btn btn-primary float-right ml-2"
                            data-toggle="modal" data-target="#request-balance-modal">
                            <i class="fas fa-pen"></i> Request Balance
                        </button>
                        <a href="{{ route('user-profile.show', $profile->id) }}" class="btn btn-primary float-right"><i class="fas fa-stream"></i> History</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12">
               <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <strong class="text-primary">Reset password</strong>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label> <span class="text-danger">*</span>
                            <input name="password" type="password" placeholder="Password" class="form-control">
                            {!!  $errors->has('password') ? showError($errors->first('password')) : ''  !!}
                        </div>

                        <div class="form-group">
                            <label for="">Confirm Password</label> <span class="text-danger">*</span>
                            <input name="confirm_password" type="password" placeholder="Confirm Password" class="form-control">
                            {!!  $errors->has('conform_password') ? showError($errors->first('conform_password')) : ''  !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @component('components.footer')
            <a href="{{ url('/') }}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Back</a>
            <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> update</button>
        @endcomponent
        {{Form::close()}}
    </div>

    <div class="modal" id="request-balance-modal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Amount</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Amount</label> <span class="text-danger">*</span>
                        <input name="amount" type="number" min="1" placeholder="Amount" class="form-control amount" required>
                        {!!  $errors->has('amount') ? showError($errors->first('amount')) : ''  !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-request-balance">Okay</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .font-weight {
            font-weight: 600;
        }

        #profile-image {
            border-radius: 50%;
            width: 130px;
            height: 130px;
            margin-bottom: 5px;
        }

        .w-15 {
            width: 15%;
        }

        .w-35 {
            width: 35%;
        }

        .font-weight {
            font-weight: 600;
        }
    </style>
@endpush
