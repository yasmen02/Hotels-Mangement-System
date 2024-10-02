@extends('Components.layout')
@section('content')
    <section class="intro mt-5 mb-5">
        <div class="bg-image">
            <div class="mask d-flex flex-column align-items-center ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; ">
                                        <table class="table table-striped mb-0">
                                            <thead class="text-black-50" style="background-color: #2976e3;">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">User ID</th>
                                                <th scope="col">Booking ID</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Payment Date</th>
                                                <th scope="col">Transaction ID</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($transactions as $transaction)
                                                <tr>
                                                    <td>{{ $transaction->id }}</td>
                                                    <td>{{ $transaction->user_id }}</td>
                                                    <td>{{ $transaction->booking_id }}</td>
                                                    <td>{{ $transaction->amount }}</td>
                                                    <td>{{ $transaction->payment_date }}</td>
                                                    <td>{{ $transaction->transaction_id }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
