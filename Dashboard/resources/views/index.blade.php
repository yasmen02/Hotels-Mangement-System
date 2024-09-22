@extends('Components.layout')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 ">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-user fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Users Registered Today</p>
                        <h6 class="mb-0">{{ $todayUsersCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Users</p>
                        <h6 class="mb-0">{{ $totalUsersCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-dollar-sign fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Revenue</p>
                        <h6 class="mb-0">${{ number_format($totalRevenue, 2) }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-exchange-alt fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Transactions</p>
                        <h6 class="mb-0">{{ $totalTransactions }}</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 ">
        <div class="h-100 bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="mb-0">Recent Payments</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                    <tr class="text-dark">
                        <th scope="col">Date</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recentPayments as $payment)
                        <tr>
                            <td>{{ $payment->created_at->format('d M Y') }}</td>
                            <td>{{ $payment->invoice_number }}</td>
                            <td>{{ $payment->customer_name }}</td>
                            <td>${{ number_format($payment->amount, 2) }}</td>
                            <td>{{ $payment->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Recent Messages</h6>
                                <a href="{{ route('contacts.index') }}">Show All</a>
                            </div>
                            @foreach($recentMessages as $message)
                                <div class="d-flex align-items-center border-bottom py-3">
                                    <img class="rounded-circle flex-shrink-0" src="{{asset('images/profile.png')}}" alt="" style="width: 40px; height: 40px;">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">{{ $message->name }}</h6>
                                            <small>{{ $message->created_at->diffForHumans() }}</small>
                                        </div>
                                        <span>{{ $message->message }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>@endsection
