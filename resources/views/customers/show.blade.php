@extends('layout')

@section('content')
    {{ Breadcrumbs::render('customers.show', $customer) }}
    <div id="applicant" class="mt-2">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-head">
                        <header>View Customer Detail</header>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-lg-2 text-center">
                                <img id="profile-image" src="{{ $customer->image_profile ?
                                     url($customer->image_profile) : url('images/default-image.jpg') }}"
                                     alt="Profile">
                                <h4>{{ $customer->name }}</h4>
                            </div>
                            <div class="col-md-10 col-sm-10 col-lg-10">
                                <table class="table table-sm table-striped">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Information</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><span class="font-weight w-15">Trainer:</span></td>
                                        <td class="w-35">{{ optional($customer->trainer)->name }}</td>
                                        <td><span class="font-weight w-15">Date Sign up:</span></td>
                                        <td class="w-35">{{ date('d-M-Y' , strtotime($customer->date_sign_up ))}} </td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-weight w-15">Phone:</span></td>
                                        <td class="w-35">{{ $customer->phone }}</td>
                                        <td><span class="font-weight w-15">Email:</span></td>
                                        <td class="w-35">{{ $customer->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="font-weight w-15">Facebook Link:</span></td>
                                        <td class="w-35">{{ $customer->facebook_link }}</td>
                                        <td><span class="font-weight w-15">Address:</span></td>
                                        <td class="w-35">{{ $customer->address }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr>

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

