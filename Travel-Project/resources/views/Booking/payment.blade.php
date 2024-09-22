@extends('components.layout')
@section('content')
<section class="payment-form dark">
    <div class="container">
        <div class="block-heading">
            <h2>Payment</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
        </div>
        <form action="{{route('payment.store')}}" method="POST">
            @csrf
            @method('post')
            @php
                $total = 0;
            @endphp
            <div class="products">
                <h3 class="title">Checkout</h3>
                @foreach($cart_items as $item)
                <div class="item">
                    <input type="hidden" name="booking_id[]" value="{{ $item->id }}">
                    <input type="hidden" name="transaction_id" value="{{ $item->id }}">
                    <input type="hidden" name="user_id" value="{{$item->user_id}}">
                    <input type="hidden" name="payment_date" value="{{ now() }}">
                    <span class="price">{{$item->total_price}}</span>
                    <p class="item-name">No of Room {{$item->room_id}}</p>
                    <p class="item-description">{{$item->room->hotel->name}}</p>
                </div>
                    @php
                        $total += $item->total_price;
                    @endphp
                @endforeach
                <div class="total">Total<span class="price">{{$total}}</span></div>
                <input type="hidden" name="amount" value="{{$total}}" >
            </div>
            <div class="card-details">
                <h3 class="title">Credit Card Details</h3>
                <div class="row">
                    <div class="form-group col-sm-7">
                        <label for="card-holder">Card Holder</label>
                        <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group col-sm-5">
                        <label for="">Expiration Date</label>
                        <div class="input-group expiration-date">
                            <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                            <span class="date-separator">/</span>
                            <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="card-number">Card Number</label>
                        <input id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cvc">CVC</label>
                        <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="submit"  class="btn btn-primary btn-block">Proceed</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
