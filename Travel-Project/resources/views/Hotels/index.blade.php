@extends('components.layout')
@section('content')
    <div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span>
                        <h1 class="mb-4 bread">Hotels</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-no-pb ftco-room">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Harbor Lights Hotels</span>
                </div>
            </div>

            <div class="row no-gutters">
                @foreach($hotels as $hotel)
                    <div class="col-lg-6">
                        <div class="room-wrap d-md-flex ftco-animate">
                            <a href="#" class="img" style="background-image: url('http://127.0.0.1:8001/images/hotel_images/{{ $hotel->hotel_image }}');"></a>
                            <div class="half left-arrow d-flex align-items-center">
                                <div class="text p-4 text-center">
                                    <p class="star mb-0">
                                        @for($i = 0; $i < $hotel->stars; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" height="12" width="13.5"
                                                 viewBox="0 0 576 512">
                                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#2f89fc"
                                                      d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                            </svg>
                                        @endfor
                                    </p>
                                    <h3 class="mb-3"><a href="rooms.html">{{$hotel->name}}</a></h3>
                                    <p class="pt-1"><a href="{{route('hotels.show',$hotel->slug)}}"
                                                       class="btn-custom px-3 py-2 rounded">View Details
                                            <svg xmlns="http://www.w3.org/2000/svg" height="12" width="10.5"
                                                 viewBox="0 0 448 512">
                                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#000000"
                                                      d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                                            </svg>
                                        </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
