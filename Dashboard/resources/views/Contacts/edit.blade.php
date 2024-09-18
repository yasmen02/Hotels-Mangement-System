@extends('Components.layout')

@section('content')
    <section class="vh-100 mt-5 mb-5">
        <div class="container h-auto">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-xl-9">
                    <h1 class="text-black-50 mb-4">Edit About</h1>
                    <form action="{{ route('contacts.update', $contacts->id) }}" method="POST" class="card"
                          style="border-radius: 15px;" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <!-- Address Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="address" class="form-control form-control-lg"
                                           value="{{ old('address',  $contacts->address) }}"/>
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
                                    <input type="text" name="phone" class="form-control form-control-lg"
                                           value="{{ old('phone', $contacts->phone) }}"/>
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
                                    <input type="email" name="email" class="form-control form-control-lg"
                                           value="{{ old('email', $contacts->email) }}"/>
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
                                    <input type="text" name="website" class="form-control form-control-lg"
                                           value="{{ old('website',  $contacts->website) }}"/>
                                    @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Image Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Image</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="file" name="image" class="form-control form-control-lg"/>
                                    @if ($contacts->image)
                                        <img src="{{ Storage::url($contacts->image) }}" alt="Image"
                                             class="img-thumbnail mt-2" style="max-width: 200px;">
                                    @endif
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Submit Button -->
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
