@extends('Components.layout')
@section('content')
    <div class="hero-wrap h-30" style="background-image: url('{{asset( $hotel->hotel_image) }}'); background-size: cover; background-position: center;">
    <div class="overlay"></div>
        <div class="container h-100">
            <div class="row no-gutters h-100 d-flex align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex flex-column align-items-center justify-content-center">
                    <div class="text">
                        <h1 class="mb-4 bread text-white">{{$hotel->name}}</h1>
{{--                        file:///C:/Users/LENOVO/OneDrive/Desktop/hotels-project/Dashboard/storage/app/public/hotel_images/pc7CDiqQWPwtLe09zsMjiS3fKL1O4mkseSMERlFs.jpg--}}
                        <img src="{{asset('storage/app/public/hotel_images/pc7CDiqQWPwtLe09zsMjiS3fKL1O4mkseSMERlFs.jpg')}}" alt="Hotel Image" />{{--                        <img src="{{ asset('storage/app/public/hotel_images/pc7CDiqQWPwtLe09zsMjiS3fKL1O4mkseSMERlFs.jpg') }}" alt="" title="" />--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="hotel-details mt-3 h-100">
        <div class="container">
            <div class="row">
                <!-- Address -->
                <div class="col-md-4 text-center mb-4">
                    <div class="detail-box p-4 bg-light rounded shadow">
                        <h3 class="text-primary mb-3">Address</h3>
                        <p>{{$hotel->address}}</p>
                    </div>
                </div>

                <!-- Star Rating -->
                <div class="col-md-4 text-center mb-4">
                    <div class="detail-box p-4 bg-light rounded shadow">
                        <h3 class="text-primary mb-3">Rating</h3>
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="fa fa-star{{ $i <= $hotel->stars ? '' : '-o' }}"></span>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Contact Number -->
                <div class="col-md-4 text-center mb-4">
                    <div class="detail-box p-4 bg-light rounded shadow">
                        <h3 class="text-primary mb-3">Contact</h3>
                        <p><a href="tel:{{$hotel->contact_number}}" class="text-dark">{{$hotel->contact_number}}</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center inherit-margin">
            <a href="{{ route('rooms.show', $hotel->slug) }}" class="btn btn-outline-primary">Available Room</a>
        </div>
    </section>
@endsection


