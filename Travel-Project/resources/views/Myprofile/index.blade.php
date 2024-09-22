@extends('components.layout')
@section('content')
    <div class="container">
        <div class="row">
            <!-- Existing Profile Section -->
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb py-3 px-3">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('myprofile.index')}}"> My Profile</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-12 bg-white p-0 px-3 py-3 mb-3">
                        <div class="d-flex flex-column align-items-center">
                            <img class="photo" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;" src="{{asset('images/profile.png')}}" alt="">
                            <p class="fw-bold h4 mt-3">{{auth()->user()->name}}</p>
                            <p class="text-muted">{{auth()->user()->email}}</p>
                            <p class="text-muted mb-3">{{auth()->user()->phone_number}}</p>
                            <div class="d-flex">
                                <div class="btn btn-primary follow me-2"><a href="{{route('myprofile.edit')}}">Edit My Information</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 ps-md-4">
                <div class="row">
                    <div class="col-12 bg-white px-3 mb-3 pb-3">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="py-2">Full Name</p>
                            <p class="py-2 text-muted">{{auth()->user()->name}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="py-2">Email</p>
                            <p class="py-2 text-muted">{{auth()->user()->email}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="py-2">Phone</p>
                            <p class="py-2 text-muted">{{auth()->user()->phone_number}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="py-2">Account Verified At</p>
                            <p class="py-2 text-muted">{{auth()->user()->email_verified_at}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="py-2">Password</p>
                            <p class="py-2 text-muted">***********</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New My Transactions Section -->
            <div class="col-12 bg-white px-3 mb-3 pb-3">
                <h5 class="py-3">My Transactions</h5>
                <div class="transaction-list">
                    @if($transactions->isEmpty())
                        <p class="text-muted">No transactions found.</p>
{{--                    @else--}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $transaction->description }}</td>
                                    <td>${{ number_format($transaction->amount, 2) }}</td>
                                    <td>{{ $transaction->status }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
