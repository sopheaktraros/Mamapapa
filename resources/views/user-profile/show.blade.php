@extends('layout')
@section('content')
<div id="user-profile">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-head">
                    <header>History</header>
                    <div class="tools">
                        <a href="{{ url('user-profile') }}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Back</a>
                        <a href="#" data-toggle="quick-sidebar" data-target="#history-filter" class="btn btn-light">
                            <i class="fa fa-filter"></i> Filter
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table id="refill-balance-history-table" 
                            data-route="{{ route('refill-balance-history.table') }}"
                            class="table table-sm table-bordered table-striped" cellspacing="0"
                            width="100%" role="grid">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>T-Code</th>
                            <th>Remark</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('quick-sidebar')
    <div id="history-filter" class="quick-sidebar">
        <div class="container">
            <div class="header">
                <div class="title">{{ __('Filters') }}</div>
                <a href="#" data-toggle="close-quick-sidebar"><i class="fal fa-times"></i></a>
            </div>
            <form id="form-filter-teacher" autocomplete="off">
                <div class="body">
                    <div class="form-group">
                        <label for="name">Amount</label>
                        <input type="text" class="form-control amount" id="amount" name="amount" 
                            placeholder="Amount" value="{{ request('amount') }}">
                    </div>

                      <div class="form-group">
                        <label for="date">Date</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="search" class="form-control datepicker date-from" id="date_from"
                                        name="date_from" placeholder="Date From" value="{{ request('date_from') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="search" class="form-control datepicker date-to"
                                    id="date_to" name="date_to" placeholder="Date To" value="{{ request('date_to') }}">
                            </div>
                        </div>
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

