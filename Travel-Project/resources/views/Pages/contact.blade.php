@extends('components.layout')
@section('content')

    <div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home</a></span> <span>Contact Us</span>
                        </p>
                        <h1 class="mb-4 bread">Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section contact-section bg-light">
        @include('message')

        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h3">Contact Information</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="info rounded bg-white p-4">
                        <span>Address:</span>
                        <p>{{$about->address}}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info rounded bg-white p-4">
                        <span>Phone:</span>
                        <p> <a href="tel://1234567920">+{{$about->phone}} </a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info rounded bg-white p-4">
                        <span class="text-black-50">Email:</span>
                        <p> <a href="mailto:info@yoursite.com"></a>{{$about->email}}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex ">
                    <div class="info rounded bg-white p-4 d-flex flex-column">
                        <span>Website:</span>
                        <p> <a href="#"></a>{{$about->website}}</p>
                    </div>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="{{route('contact.store')}}" method="POST" class="bg-white p-5 contact-form">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->user()->id : null }}">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="email"  class="form-control" placeholder="Your Email">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                            @error('phone')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control"
                                      placeholder="Message"></textarea>
                            @error('message')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5">Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex">
                    <div id="map" class="bg-white"></div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        navigator.geolocation.watchPosition(success,error);
        function success(pos){
            const lat  = pos.coords.latitude;
            const lng = pos.coords.longitude;
            const accuracy = pos.coords.accuracy;
            L.marker([lat,lng]).addTo(map);
            L.circle([lat,lng],{ radius:accuracy}).addTo(map);
        }
        function error(err){
            if(err.code ===1){
                alert('please allow geolocation access');
            }else{
                alert('cannot get current location');
            }
        }
    </script>
@endsection
