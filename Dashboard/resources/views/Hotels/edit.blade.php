@extends('Components.layout')
@section('content')
    <section class=" mt-5 mb-5" style="background-color: #ffffff;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-xl-9">
                    <h1 class="text-black-50 mb-4">Edit {{$hotel->slug}}</h1>
                    <form action="{{route('hotels.update',$hotel->id)}}" method="POST" class="card" style="border-radius: 15px;" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Hotel Name</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="name" value="{{$hotel->name}}" class="form-control form-control-lg"/>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="address" value="{{$hotel->address}}" class="form-control form-control-lg"/>
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Stars</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="number" name="stars" value="{{$hotel->stars}}" class="form-control form-control-lg" min="1" max="5"/>
                                    @error('stars')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Hotel Image</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <img src="{{ asset('images/hotel_images/' . $hotel->hotel_image) }}" alt="Current Image" class="img-fluid mb-2" style="max-width: 300px;" />
                                    <input type="file" name="hotel_image" value="{{$hotel->hotel_image}}" class="form-control form-control-lg"/>
                                    @error('hotel_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Contact Number</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="tel" name="contact_number" value="{{$hotel->contact_number}}" class="form-control form-control-lg" placeholder="+962"/>
                                    @error('contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="px-5 py-4">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-lg">Save
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

