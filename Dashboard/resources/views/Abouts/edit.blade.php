@extends('Components.layout')
@section('content')
    <section class=" mt-5 mb-5">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-xl-9">
                    <h1 class="text-black-50 mb-4">Edit About information</h1>
                    <form action="{{ route('abouts.update', $about->id) }}" method="POST" class="card" style="border-radius: 15px;" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <!-- Title Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Title</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="title" class="form-control form-control-lg" value="{{ old('title', $about->title) }}" required />
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
                                    <textarea name="description" class="form-control form-control-lg" rows="3" required>{{ old('description', $about->description) }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Address Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="address" class="form-control form-control-lg" value="{{ old('address', $about->address) }}" required />
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Phone Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="phone" class="form-control form-control-lg" value="{{ old('phone', $about->phone) }}" required />
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Email Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email', $about->email) }}" required />
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Website Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Website</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="website" class="form-control form-control-lg" value="{{ old('website', $about->website) }}" />
                                    @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Image Upload Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Image</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="file" name="image" class="form-control form-control-lg" accept="image/*" />
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if($about->image)
                                        <div class="mt-2">
                                            <img src="{{ asset($about->image) }}" alt="Current Image" style="max-width: 100%; height: auto;" />
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="px-5 py-4">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Update Entry</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
