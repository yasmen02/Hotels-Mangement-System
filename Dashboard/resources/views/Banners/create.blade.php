@extends('Components.layout')
@section('content')
    <section class=" mt-5 mb-5">
        <div class="container h-auto">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                    <h1 class="text-black-50 mb-4">Add New Banner</h1>
                    <form action="{{route('banners.store')}}" method="POST" class="card" style="border-radius: 15px;" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <!-- Room ID Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Room</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <select name="room_id" class="form-control form-control-lg">
                                        <option value="">Select a Room</option>
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}">  {{$room->hotel->name}} - Room #{{$room->room_number}} </option>
                                        @endforeach
                                    </select>
                                    @error('room_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <!-- Discount Field -->
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Discount</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="discount" class="form-control form-control-lg" />
                                    @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="px-5 py-4">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-lg">Add Entry
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
