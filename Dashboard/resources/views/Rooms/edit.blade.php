@extends('Components.layout')
@section('content')
    <section class="vh-100 mt-5 mb-5" style="background-color: #f8f9fa;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <div class="card shadow-sm" style="border-radius: 15px;">
                        <div class="card-body">
                            <h1 class="text-dark mb-4">Edit Room {{$room->room_number}}</h1>
                            <form action="{{route('rooms.update',$room->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <!-- Room Description -->
                                <div class="mb-4">
                                    <label for="room_description" class="form-label">Room Description</label>
                                    <input type="text" id="room_description" name="room_description"
                                           value="{{$room->room_description}}" class="form-control form-control-lg" />
                                    @error('room_description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Room Image -->
                                <div class="mb-4">
                                    <label for="room_image" class="form-label">Room Image</label>
                                    <input type="file" id="room_image" name="room_image" class="form-control form-control-lg" />
                                    @error('room_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Room Price -->
                                <div class="mb-4">
                                    <label for="room_price" class="form-label">Room Price</label>
                                    <input type="number" id="room_price" name="room_price"
                                           value="{{$room->room_price}}" class="form-control form-control-lg" placeholder="+962"/>
                                    @error('room_price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Room Type -->
                                <div class="mb-4">
                                    <label for="room_type" class="form-label">Room Type</label>
                                    <select id="room_type" name="room_type" class="form-select form-select-lg">
                                        <option value="" disabled selected>Select type room</option>
                                        <option value="Single">Single</option>
                                        <option value="Double">Double</option>
                                        <option value="Deluxe">Deluxe</option>
                                        <option value="Suite">Suite</option>
                                    </select>
                                </div>

                                <!-- Room Status -->
                                <div class="mb-4">
                                    <label for="room_status" class="form-label">Room Status</label>
                                    <select id="room_status" name="room_status" class="form-select form-select-lg">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="available">Available</option>
                                        <option value="unavailable">Unavailable</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
