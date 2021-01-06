@extends('layout')

@section('content')
    {{ Breadcrumbs::render('customers.edit', $customer) }}

    <div id="customers">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-head">
                        <header>Edit Customer</header>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['url' => url('customers/'.$customer->id), 'files' => 'true' , 'id' => 'form-validation','autocomplete' => 'off', 'method' => 'put']) }}

                        <div class="form-group">
                            <label>Date sign up</label>
                            <input type="text" class="form-control datepicker" id="date-sign-up" name="date_sign_up"
                                   value="{{ date('m/d/Y',strtotime($customer->date_sign_up)) }}" placeholder="Date sign up" required>

                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{$customer->name}}" placeholder="Name" >
                                    {!!  $errors->has('name') ? showError($errors->first('name')) : ''  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Select Trainer</label>
                                    <select class="form-control select2" name="trainer_id">
                                        <option value="">Select Trainer</option>
                                        @foreach($trainers as $trainer)
                                            <option value="{{ $trainer->id }}" {{($trainer->id==$trainer->id)? 'selected':''}}>{{ $trainer->name }}</option>
                                        @endforeach
                                    </select>
                                    {!!  $errors->has('trainer_id') ? showError($errors->first('trainer_id')) : ''  !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control format-phone" id="phone" name="phone"
                                        value="{{$customer->phone}}" placeholder="Phone" required>
                                    {!!  $errors->has('phone') ? showError($errors->first('phone')) : ''  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{$customer->email}}" placeholder="Email" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Facebook Link</label>
                            <input type="text" class="form-control" id="facebook-link" name="facebook_link"
                                   value="{{$customer->facebook_link}}" placeholder="facebook link" >
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" id="address" placeholder="Address"
                                      cols="30" rows="3">{{$customer->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Remark</label>
                            <textarea type="text" class="form-control" id="remark" name="remark" placeholder="Remark"  
                                      cols="30" rows="3">{{$customer->remark}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Status(Inactive/Active)</label><span class="text-danger">*</span>
                            <div class="can-toggle can-toggle--size-small">
                                <input id="status" type="checkbox" {{ $customer->active == 1 ? 'checked' : ''}} value="1"
                                       name="active"/>
                                <label for="status">
                                    <div class="can-toggle__switch" data-checked="Active"
                                         data-unchecked="Inactive"></div>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-head">
                        <header>Profile Image</header>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group text-center">
                                    <img class="border w-100"
                                         src="{{ $customer->image_profile ? url($customer->image_profile) : url('images/default-image.jpg') }}"
                                         alt="Image">
                                    <span class="btn btn-primary mt-2">Browse</span>
                                    <input type="file" name="profile_image" accept="image/*" class="file-hidden preview-image"
                                           value="{{ $customer->image }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
               <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <strong class="text-primary">Reset password</strong>
                        </div>

                        <div class="form-group">
                            <label>Username</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" id="username" value="{{$customer->username}}" name="username" required>
                            {!!  $errors->has('username') ? showError($errors->first('username')) : ''  !!}
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
            </div>
        </div>
        @component('components.footer')
            <a href="{{ url('customers') }}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Back</a>
            <button type="submit" class="btn btn-primary" id="create"><i class="fas fa-pen"></i> Update</button>
        @endcomponent
        {{Form::close()}}
    </div>
@endsection