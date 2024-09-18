@extends('components.layout')
@section('content')
    <div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
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
                        <a href="blog-single.html" class="block-20 rounded" style="background-image:  url('{{ $blog->image }}');">
                        </a>
                        <div class="text mt-3">
                            <div class="meta mb-2">
                                <div><a href="#">{{ $blog->created_at}}</a></div>
                                <div><a href="#">{{$blog->author}}</a></div>
                                <div><a href="#" class="meta-chat"><svg xmlns="http://www.w3.org/2000/svg" height="10" width="10" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#2f89fc" d="M64 0C28.7 0 0 28.7 0 64L0 352c0 35.3 28.7 64 64 64l96 0 0 80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416 448 416c35.3 0 64-28.7 64-64l0-288c0-35.3-28.7-64-64-64L64 0z"/></svg> 3</a></div>
                            </div>
                            <h2 class="heading">{{$blog->title}}</h2>
                            <h3 class="heading"><a href="#">{{$blog->description}}</a></h3>
                            <a href="#" class="btn btn-secondary rounded">More info</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination Links -->
            <div class="flex justify-center">
                {{$blogs->links()}}
            </div>
        </div>
    </section>
@endsection
