@extends('layout')
@section('content')
    {{ Breadcrumbs::render('customers.index') }}
    <div id="customers">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-head">
                        <header>Customers</header>
                        <div class="tools">
                            @if(haspermission('customers', 'write'))
                                <a href="{{route('customers.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> New</a>
                            @endif
                            @if(haspermission('customers', 'read'))
                                <a href="{{route('customers.dashbord')}}" class="btn btn-primary"><i class="fas fa-chart-line"></i> Dashbord</a>
                            @endif
                            <a href="#" data-toggle="quick-sidebar" data-target="#customer-filter-container" class="btn btn-light"><i class="fa fa-filter"></i>Filter</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="customer-table" data-route="{{ route('customers.table') }}"
                                   class="table table-sm table-bordered table-striped" cellspacing="0"
                                   width="100%" role="grid" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Date Sign Up</th>
                                    <th>Address</th>
                                    <th>Remark</th>
                                    <th>Total Withdraw</th>
                                    <th>Total Deposit</th>
                                    <th>Total Spending</th>
                                    <th>Total Balance</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot align="right">
                                    <td colspan="6" style="text-align:right !important"><b>Total:</b></td>
                                    <td>
                                        <b><span>$0</span></b>
                                    </td>
                                    <td>
                                        <b><span>$0</span></b>
                                    </td>
                                    <td>
                                        <b><span>$0</span></b>
                                    </td>
                                    <td>
                                        <b><span>$0</span></b>
                                    </td>
                                    <td colspan="2"></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('quick-sidebar')
    <div id="customer-filter-container" class="quick-sidebar">
        <div class="container">
            <div class="header">
                <div class="title">{{ __('Filters') }}</div>
                <a href="#" data-toggle="close-quick-sidebar"><i class="fal fa-times"></i></a>
            </div>
            <form id="form-filter-teacher" autocomplete="off">
                <div class="body">

                    <div class="form-group">
                        <label for="name">ID</label>
                        <input type="search" class="form-control cus-id" id="cus_id" name="cus_id"
                               placeholder="ID" value="{{ request('cus_id') }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="search" class="form-control cus-name" id="name" name="name"
                               placeholder="Name" value="{{ request('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="text" class="form-control format-phone phone" id="phone" name="phone"
                               placeholder="Phone" value="{{ request('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="search" class="form-control datepicker date-from" id="date_from"
                                       name="date_from" placeholder="Date From" value="{{ request('date_from') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="search" class="form-control datepicker date-to" id="date_to"
                                       name="date_to" placeholder="Date To" value="{{ request('date_to') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        {{
                            Form::select('active', [1 => 'Active', 0 => 'Inactive'], request()->active, [
                                'id' => 'status',
                                'class' => 'form-control active select2',
                                'placeholder' => '-- Choose Status --'
                            ])
                        }}
                    </div>

                    <div class="form-group text-right">
                        <a href="#" data-toggle="close-quick-sidebar" class="btn btn-light"><i class="fas fa-sign-out-alt"></i> {{ __('Close') }}</a>
                        <button class="btn btn-primary"><i class="fas fa-filter"></i> {{ __('Filter') }}</button>
                    </div>
                </div>
            </form>
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
