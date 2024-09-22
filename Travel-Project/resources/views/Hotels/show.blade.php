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
                        <h1 class="mb-4 bread">{{$hotel->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @foreach($rooms as $room)
                    <div class="row p-2 bg-white border rounded mt-2">
                        <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="#">
                        </div>
                        <div class="col-md-6 mt-1">
                            <h5>{{$room->room_type}} Room</h5>
                            <div class="d-flex flex-row">
                                <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                <span>{{$room->room_number}}</span>
                            </div>
                            <p class="text-justify text-truncate para mb-0">{{$room->room_description}}<br><br></p>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1">${{$room->room_price}}</h4>
                            </div>
                            <div class="d-flex flex-column mt-4">
                                <button class="btn btn-primary btn-sm" type="button"><a class="text-black-50"
                                                                                        href="{{ route('booking.index', ['slug' => $hotel->slug, 'id' => $room->id]) }}">Booking
                                        Now</a></button>
                                <button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
