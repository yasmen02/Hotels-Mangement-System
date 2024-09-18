@extends('Components.layout')
@section('content')
    <section class="vh-100 mt-5 mb-5" >
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10 col-lg-12 col-md-12">
                    <div class="card shadow-sm" style="border-radius: 15px;">
                        <div class="card-body">
                            <h1 class="text-dark mb-4">Edit Booking #{{$booking->id}}</h1>
                            <form action="{{route('booking.update',$booking->id)}}" method="POST">
                                @csrf
                                @method('patch')
                                <!-- Status -->
                                <div class="mb-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select id="status" name="status" class="form-select form-select-lg">
                                        <option
                                            value="booked" {{ $booking->status == 'booked' ? 'selected' : '' }}>
                                            Booked
                                        </option>
                                        <option
                                            value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled
                                        </option>
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
