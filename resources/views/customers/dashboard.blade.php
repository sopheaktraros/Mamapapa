@extends('layout')

@section('content')
    <div id="applicant" class="mt-2">
       
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-head">
                        <header>Customer Transaction Dashboard</header>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Total Balance</header>
                                    </div>
                                    <div class="card-body">
                                        <i class="fas fa-file-invoice-dollar" style="font-size: 50px"></i>
                                         <h1 class="text-danger float-right">$ {{$totalBalance}}</h1>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Total Spending</header>
                                    </div>
                                    <div class="card-body">
                                        <i class="fas fa-share" style="font-size: 50px"></i> 
                                        <h1 class="text-danger float-right">$ {{$totalSpending}}</h1>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Total Deposit</header>
                                    </div>
                                    <div class="card-body">
                                        <i class="fas fa-money-check-alt" style="font-size: 50px"></i>
                                        <h1 class="text-danger float-right">$ {{$totalDeposit}}</h1>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Total Withdraw</header>
                                    </div>
                                    <div class="card-body">
                                        <i class="fas fa-sign-out-alt" style="font-size: 50px"></i>
                                        <h1 class="text-danger float-right">$ {{$totalWithdraw}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
            </div>
        </div>
        @component('components.footer')
            <a href="{{ url('customers') }}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Back</a>
        @endcomponent
    </div>
@endsection

@push('css')
    <style>
        .font-weight {
            font-weight: 600;
        }
    </style>
@endpush

