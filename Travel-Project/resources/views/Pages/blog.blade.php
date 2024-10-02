@extends('components.layout')
@section('content')
    <div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span>
                            <span>Blog</span></p>
                        <h1 class="mb-4 bread">Our Stories</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
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
                                    <div><a href="#">{{$blog->author ? $blog->author->name : 'Unknown Author' }}</a></div>
                                </div>
                                <h2 class="heading">{{$blog->title}}</h2>
                                <h3 class="heading"><a href="#">{{$blog->description}}</a></h3>
                                <a href="#" class="btn btn-secondary rounded">More info</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
