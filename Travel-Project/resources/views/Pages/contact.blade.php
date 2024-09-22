@extends('components.layout')
@section('content')
    <div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact Us</span>
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
                        <p><span>Address:</span></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info rounded bg-white p-4">
                        <p><span>Phone:</span> <a href="tel://1234567920">+ </a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info rounded bg-white p-4">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com"></a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info rounded bg-white p-4">
                        <p><span>Website</span> <a href="#"></a></p>
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
@endsection
