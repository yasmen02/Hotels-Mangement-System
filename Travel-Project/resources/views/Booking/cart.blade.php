@extends('components.layout')
@section('content')
    <div class="hero-wrap"
         style="background-image: url('https://images.pexels.com/photos/3285725/pexels-photo-3285725.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span>
                        <h1 class="mb-4 bread">Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('message')
    @if($cart_items->isEmpty())
            <div class="container mb-5 mt-5">
                <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                        <div class="text">
                            <h1 class="mb-4 bread">Don't found any Booking</h1>
                            <button class="submit-btn btn-lg"><a class="text-white" href="{{route('hotels.index')}}">Hotels</a></button>
                        </div>
                    </div>
                </div>
            </div>
    @else
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                @foreach($cart_items as $item)
                    @if($item->status==='cancelled')
                    <div class="col-md-10">
                        <div class="row p-2 bg-white border rounded mt-2">
                            <div class="col-md-3 mt-1">
                                <img class="img-fluid img-responsive rounded product-image"
                                     src="https://images.pexels.com/photos/28011238/pexels-photo-28011238/free-photo-of-a-hotel-room-with-a-bed-and-a-window.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                            </div>
                            <div class="col-md-6 mt-1">
                                <h5>No of Room {{$item->room_id}} {{$item->room->hotel->name}}</h5>
                                <div class="d-flex flex-row">
                                    <div class="ratings mr-2">
                                        <span>check in: {{$item->check_in_date}}</span>
                                        <br>
                                        <span>check out: {{$item->check_out_date}}</span>
                                    </div>
                                </div>
                                <div class="ratings mr-2">
                                    <span>{{$item->email}}</span>
                                    <br>
                                    <span>{{$item->phone}}</span>
                                </div>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-column align-items-center">
                                    <h4 class="mr-1">${{$item->total_price}}</h4>
                                    <span>no of adults: {{$item->no_of_adults}}</span>
                                    <span>no of children: {{$item->no_of_children}}</span>
                                </div>
                                <div class="d-flex flex-column mt-4">
                                    <form method="POST" class="submit-btn btn-sm d-flex justify-content-center" action="{{route('booking.destroy', $item->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="submit-btn btn-sm" type="submit" style="border:none;">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20.25" viewBox="0 0 448 512">
                                                <path fill="#ffffff" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                        <a href="{{route('booking.edit', $item->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                                                <path fill="#74C0FC" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                                            </svg>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach

            </div>
        </div>
        <div class="d-flex justify-content-center row m-3">
            <button class="submit-btn btn-lg mt-2" type="submit">
                <a class="text-white" href="{{route('payment.index')}}">Checkout</a>
            </button>
        </div>
    @endif

@endsection
