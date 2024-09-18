@extends('Components.layout')

@section('content')
    <section class="vh-100 mt-5 mb-5">
        <div class="container h-auto">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-xl-9">
                    <h1 class="text-black-50 mb-4">Edit About information</h1>
                    <form action="{{ route('abouts.update', $about->id) }}" method="POST" class="card"
                          style="border-radius: 15px;" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <!-- Title Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Title</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="title" class="form-control form-control-lg"
                                           value="{{ old('title', $about->title) }}"/>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Description Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Description</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <textarea name="description" class="form-control form-control-lg"
                                              rows="4">{{ old('description', $about->description) }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Image 1 Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Image 1</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="file" name="image1" class="form-control form-control-lg"/>
                                    @if($about->image1)
                                        <img src="{{ asset('storage/' . $about->image1) }}" alt="Image 1"
                                             class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @endif
                                    @error('image1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Image 2 Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Image 2</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="file" name="image2" class="form-control form-control-lg"/>
                                    @if($about->image2)
                                        <img src="{{ asset('storage/' . $about->image2) }}" alt="Image 2"
                                             class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @endif
                                    @error('image2')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="px-5 py-4">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-lg">Update About
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
