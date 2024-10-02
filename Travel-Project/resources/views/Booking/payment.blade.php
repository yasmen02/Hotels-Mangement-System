@extends('components.layout')
@section('content')
<section class="payment-form dark">
    <div class="container">
        <div class="block-heading">
            <h2>Payment</h2>
        </div>
        <form action="{{ route('payment.store') }}" method="POST">
            @csrf
            @method('post')
            @php
                $total = 0;
            @endphp
            <div class="products">
                <h3 class="title">Checkout</h3>
                @include('message')
                @foreach($cart_items as $item)
                    @if($item->status === 'cancelled')
                        <div class="item">
                            <input type="hidden" name="booking_id[]" value="{{ $item->id }}">
                            <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                            <input type="hidden" name="payment_date" value="{{ now() }}">
                            <span class="price">{{ $item->total_price }}</span>
                            <p class="item-name">No of Room {{ $item->room_id }}</p>
                            <p class="item-description">{{ $item->room->hotel->name }}</p>
                        </div>
                        @php
                            $total += $item->total_price;
                        @endphp
                    @endif
                @endforeach
                <div class="total">Total<span class="price">{{ $total }}</span></div>
                <input type="hidden" name="amount" value="{{ $total }}">
            </div>
            <div class="card-details">
                <h3 class="title">Payment Details</h3>
                <div class="form-group">
                    <label for="payment-method">Payment Method</label>
                    <select id="payment-method" name="payment_method" class="form-control">
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                    @error('payment_method')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="payment-type">Payment Type</label>
                    <select id="payment-type" name="payment_type" class="form-control">
                        <option value="visa">Visa</option>
                        <option value="mastercard">MasterCard</option>
                        <option value="amex">American Express</option>
                        <!-- Add more payment types as needed -->
                    </select>
                    @error('payment_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <h3 class="title">Credit Card Details</h3>
                <div class="row">
                    <div class="form-group col-sm-7">
                        <label for="card-holder">Card Holder</label>
                        <input id="card-holder" type="text" name="card_holder" class="form-control" placeholder="Card Holder" >
                        @error('card_holder')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-5">
                        <label for="">Expiration Date</label>
                        <div class="input-group expiration-date">
                            <input type="text" name="exp_month" class="form-control" placeholder="MM" >
                            <span class="date-separator">/</span>
                            <input type="text" name="exp_year" class="form-control" placeholder="YY" >
                        </div>
                        @error('exp_month')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @error('exp_year')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="card-number">Card Number</label>
                        <input id="card-number" type="text" name="card_number" class="form-control" placeholder="0000-0000-0000-0000" >
                        @error('card_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cvc">CVC</label>
                        <input id="cvc" type="text" name="cvc" class="form-control" placeholder="CVC" >
                        @error('cvc')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input name="payment_date" type="hidden" value="{{now()}}">
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block">Proceed</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
