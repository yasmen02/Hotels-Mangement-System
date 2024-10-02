@extends('components.layout')
@section('content')
    <div class="hero">
        <section class="home-slider owl-carousel">
            @foreach($banners as $banner)
                @if($banner->room && $banner->room->hotel)
                    <div class="slider-item" style="background-image:url('http://127.0.0.1:8001/images/hotel_images/{{$banner->room->hotel->hotel_image}}');">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row no-gutters slider-text align-items-center justify-content-end">
                                <div class="col-md-6 ftco-animate">
                                    <div class="text">
                                        <h2>{{ $banner->room->hotel->name }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Welcome to Harbor Lights Hotel</span>
                    <h2 class="mb-4">You'll Never Want To Leave</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#21cc7a"
                                          d="M216 64c-13.3 0-24 10.7-24 24s10.7 24 24 24l16 0 0 33.3C119.6 157.2 32 252.4 32 368l448 0c0-115.6-87.6-210.8-200-222.7l0-33.3 16 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-40 0-40 0zM24 400c-13.3 0-24 10.7-24 24s10.7 24 24 24l464 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L24 400z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Friendly Service</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services active py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 448 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#21cc71"
                                          d="M416 0C400 0 288 32 288 176l0 112c0 35.3 28.7 64 64 64l32 0 0 128c0 17.7 14.3 32 32 32s32-14.3 32-32l0-128 0-112 0-208c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7L80 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224.4c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16l0 134.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8L64 16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Get Breakfast</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#21cc71"
                                          d="M280 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 80c0 13.3 10.7 24 24 24s24-10.7 24-24l0-80zM185.8 224l140.3 0c6.8 0 12.8 4.3 15.1 10.6L360.3 288l-208.6 0 19.1-53.4c2.3-6.4 8.3-10.6 15.1-10.6zm-75.3-10.9L82.2 292.4C62.1 300.9 48 320.8 48 344l0 40 0 64 0 32c0 17.7 14.3 32 32 32l16 0c17.7 0 32-14.3 32-32l0-32 256 0 0 32c0 17.7 14.3 32 32 32l16 0c17.7 0 32-14.3 32-32l0-32 0-64 0-40c0-23.2-14.1-43.1-34.2-51.6l-28.3-79.3C390.1 181.3 360 160 326.2 160l-140.3 0c-33.8 0-64 21.3-75.3 53.1zM128 344a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm232 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM39 39c-9.4 9.4-9.4 24.6 0 33.9l48 48c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9L73 39c-9.4-9.4-24.6-9.4-33.9 0zm400 0L391 87c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l48-48c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Transfer Services</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="36" viewBox="0 0 576 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#21cc71"
                                          d="M183.1 235.3c33.7 20.7 62.9 48.1 85.8 80.5c7 9.9 13.4 20.3 19.1 31c5.7-10.8 12.1-21.1 19.1-31c22.9-32.4 52.1-59.8 85.8-80.5C437.6 207.8 490.1 192 546 192l9.9 0c11.1 0 20.1 9 20.1 20.1C576 360.1 456.1 480 308.1 480L288 480l-20.1 0C119.9 480 0 360.1 0 212.1C0 201 9 192 20.1 192l9.9 0c55.9 0 108.4 15.8 153.1 43.3zM301.5 37.6c15.7 16.9 61.1 71.8 84.4 164.6c-38 21.6-71.4 50.8-97.9 85.6c-26.5-34.8-59.9-63.9-97.9-85.6c23.2-92.8 68.6-147.7 84.4-164.6C278 33.9 282.9 32 288 32s10 1.9 13.5 5.6z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Suits &amp; SPA</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="40" viewBox="0 0 640 512">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#21cc71"
                                          d="M32 32c17.7 0 32 14.3 32 32l0 256 224 0 0-160c0-17.7 14.3-32 32-32l224 0c53 0 96 43 96 96l0 224c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-32-224 0-32 0L64 416l0 32c0 17.7-14.3 32-32 32s-32-14.3-32-32L0 64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Cozy Rooms</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-wrap-about ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-7 order-md-last d-flex">
                    <div class="img img-1 mr-md-2 ftco-animate"
                         style="background-image:  url('http://127.0.0.1:8001/images/about_images/{{ $about->image}}');">

                    </div>
                    <div class="img img-2 ml-md-2 ftco-animate"
                         style="background-image: url('http://127.0.0.1:8001/images/about_images/{{ $about->image}}');"></div>
                </div>
                <div class="col-md-5 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
                    <div class="heading-section mb-4 my-5 my-md-0">
                        <span class="subheading">About Harbor Lights Hotel</span>
                        <h2 class="mb-4">{{$about->title}}</h2>
                    </div>
                    <p>{{$about->description}}</p>
                    <p><a href="{{route('hotels.index')}}" class="btn btn-secondary rounded">Reserve Your Room Now</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="testimony-section">
        <div class="container">
            <div class="row no-gutters ftco-animate justify-content-center">
                <div class="col-md-5 d-flex">
                    <div class="testimony-img aside-stretch-2"
                         style="background-image: url(images/testimony-img.jpg);"></div>
                </div>
                <div class="col-md-7 py-5 pl-md-5">
                    <div class="py-md-5">
                        <div class="heading-section ftco-animate mb-4">
                            <span class="subheading">Testimony</span>
                            <h2 class="mb-0">Happy Customer</h2>
                        </div>
                    @foreach($reviews as $review)
                        <div class="carousel-testimony owl-carousel ftco-animate">
                                <div class="item">
                                    <div class="testimony-wrap pb-4">
                                        <div class="text">
                                            <p class="mb-4">{{$review->comment}}.</p>
                                        </div>
                                        <div class="d-flex">
                                            <div class="user-img" style="background-image: url(images/person_1.jpg)">
                                            </div>
                                            <div class="pos ml-3">
                                                @for($i = 0; $i < $review->rating; $i++)
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="12" width="13.5"
                                                         viewBox="0 0 576 512">
                                                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path fill=" #FFD600"
                                                              d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                                                    </svg>
                                                @endfor
                                                <p class="name">{{$review->user->name}}</p>
                                                <span class="email">{{$review->user->email}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="special-offers-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center section-header">
                    <span class="subheading">Harbor Lights Rooms</span>
                    <h2 class="main-heading">Special Offers Rooms</h2>
                </div>
            </div>
            <div class="row">
                @foreach($banners as $banner)
                    @if($banner->room && $banner->room->hotel)
                        <div class="col-md-4 mb-4">
                            <div class="offer-card">
                                <a href="#" class="offer-image"

                                style="background-image: url('http://127.0.0.1:8001/images/room_images/{{ $banner->room->room_image}}');">
                                    <div class="image-overlay">
                                        <div class="overlay-content">
                                            <h2 class="hotel-name">{{ $banner->room->hotel->name }}</h2>
                                        </div>
                                    </div>
                                </a>
                                <div class="offer-details text-center">
                                    <div class="price-meta">
                                        <p><strong>Price:</strong> {{ $banner->room->room_price }}</p>
                                        <p><strong>Type:</strong> {{ $banner->room->room_type }}</p>
                                        <p><strong>Discount:</strong> {{ $banner->discount }}%</p>
                                    </div>
                                    <p class="room-description">{{ $banner->room->room_description }}</p>
                                    <a href="{{ route('booking.index', ['slug' => $banner->room->hotel->slug, 'id' => $banner->room->id]) }}" class="btn btn-book">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Read Blog</span>
                    <h2>Recent Blog</h2>
                </div>
            </div>
            <div class="row d-flex">
                @foreach($blogs as $blog)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="blog-single.html" class="block-20 rounded"
                               style="background-image:  url('http://127.0.0.1:8001/images/blogs_images/{{ $blog->image }}');">
                            </a>
                            <div class="text mt-3">
                                <div class="meta mb-2">
                                    <div><a href="#">{{ $blog->created_at}}</a></div>
                                    <div><a href="#">{{$blog->author}}</a></div>
                                    <div><a href="#" class="meta-chat">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10"
                                                 viewBox="0 0 512 512">
                                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#2f89fc"
                                                      d="M64 0C28.7 0 0 28.7 0 64L0 352c0 35.3 28.7 64 64 64l96 0 0 80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416 448 416c35.3 0 64-28.7 64-64l0-288c0-35.3-28.7-64-64-64L64 0z"/>
                                            </svg>
                                            3</a></div>
                                </div>
                                <h2 class="heading ">{{$blog->title}}</h2>
                                <p ><a class="text-black-50" href="#">{{$blog->description}}</a></p>
                                <a href="{{$blog->url}}" class="btn btn-secondary rounded">More info</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="instagram">
        <div class="container-fluid">
            <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Photos</span>
                    <h2><span>Instagram</span></h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="images/insta-1.jpg" class="insta-img image-popup"
                       style="background-image: url(images/insta-1.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="images/insta-2.jpg" class="insta-img image-popup"
                       style="background-image: url(images/insta-2.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="images/insta-3.jpg" class="insta-img image-popup"
                       style="background-image: url(images/insta-3.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="images/insta-4.jpg" class="insta-img image-popup"
                       style="background-image: url(images/insta-4.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="images/insta-5.jpg" class="insta-img image-popup"
                       style="background-image: url(images/insta-5.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @auth
    <button class="sticky-feedback submit-btn"><a class="text-white" href="{{route('reviews.create')}}">Feedback</a></button>
    @endauth
@endsection


