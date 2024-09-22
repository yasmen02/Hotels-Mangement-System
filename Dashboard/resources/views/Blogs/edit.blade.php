@extends('Components.layout')
@section('content')
    <section class=" mt-5 mb-5">
        <div class="container h-auto">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                    <h1 class="text-black-50 mb-4">Edit Blog</h1>
                    <form action="{{route('blogs.update',$blog->id)}}" method="POST" class="card" style="border-radius: 15px;" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Title</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="title" class="form-control form-control-lg" value="{{ old('title', $blog->title) }}" />
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Description</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <textarea name="description" class="form-control form-control-lg" rows="4">{{ old('description', $blog->description) }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Current Image</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Current Image" class="img-fluid mb-2" style="max-width: 300px;" />
                                    <input type="file" name="image" class="form-control form-control-lg" />
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">URL</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="url" name="url" class="form-control form-control-lg" value="{{ old('url', $blog->url) }}" />
                                    @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Author</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="author" class="form-control form-control-lg" value="{{ old('author', $blog->author) }}" />
                                    @error('author')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg">Update Blog</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
