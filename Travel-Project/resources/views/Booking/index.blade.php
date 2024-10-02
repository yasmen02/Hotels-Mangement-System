@extends('components.layout')
@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pricePerNightInput = document.getElementById('price_per_night');
            const checkInDateInput = document.getElementById('check_in_date');
            const checkOutDateInput = document.getElementById('check_out_date');
            const totalPriceInput = document.getElementById('total_price');

            function calculateTotalPrice() {
                const pricePerNight = parseFloat(pricePerNightInput.value.replace(/[^0-9.-]+/g, ""));
                const checkInDate = new Date(checkInDateInput.value);
                const checkOutDate = new Date(checkOutDateInput.value);

                if (checkInDate && checkOutDate && !isNaN(pricePerNight)) {
                    const timeDiff = checkOutDate - checkInDate;
                    const numberOfNights = Math.ceil(timeDiff / (1000 * 3600 * 24));

                    if (numberOfNights > 0) {
                        const totalPrice = numberOfNights * pricePerNight;
                        totalPriceInput.value = `${totalPrice.toFixed(2)}`;
                    } else {
                        totalPriceInput.value = `0.00`;
                    }
                } else {
                    totalPriceInput.value = `0.00`;
                }
            }

            function validateCheckInDate() {
                const today = new Date();
                const checkInDate = new Date(checkInDateInput.value);

                // Set the minimum date for check-in to today
                if (checkInDate < today) {
                    alert("Check-in date cannot be in the past.");
                    checkInDateInput.value = ""; // Clear the invalid date
                    totalPriceInput.value = `0.00`; // Reset total price
                    return;
                }
                calculateTotalPrice();
            }

            // Add event listeners
            checkInDateInput.addEventListener('change', validateCheckInDate);
            checkOutDateInput.addEventListener('change', calculateTotalPrice);
        });
    </script>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row ">
                    <div class="booking-form ">
                        <div class="form-header">
                            <h1>Make your reservation</h1>
                        </div>
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            <a href="{{route('availableDays',$room->id)}}"> Show Available Days </a>
                        @endif
                        <form action="{{route('booking.store',['slug' => $hotel->slug, 'id' => $room->id])}}"
                              method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="room_id" value="{{$room->id}}">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">No of Room</span>
                                        <input class="form-control" type="text" id="room_id" name="room_id"
                                               value="{{$room->id}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Type of Room</span>
                                        <input class="form-control" type="text" id="room_type" name="room_type"
                                               value="{{$room->room_type}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="date" id="check_in_date" name="check_in_date"
                                        >
                                        <span class="form-label">Check In</span>
                                        @error('check_in_date')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="date" id="check_out_date"
                                               name="check_out_date" >
                                        <span class="form-label">Check Out</span>
                                        @error('check_out_date')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" id="no_of_adults" name="no_of_adults" >
                                            <option value="" selected hidden>No of Adults</option>
                                            <option>1</option>
                                            @if($room->room_type!='Single')
                                                <option>2</option>
                                            @elseif($room->room_type!='Single' and $room->room_type!='Double')
                                                <option>3</option>
                                            @endif
                                        </select>
                                        <span class="form-label">Adults</span>
                                        @error('no_of_adults')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" id="no_of_children" name="no_of_children" >
                                            <option value="" selected hidden>No of Children</option>
                                            <option>0</option>
                                            @if($room->room_type!='Single')
                                                <option>1</option>
                                            @elseif($room->room_type!='Single' and $room->room_type!='Double')
                                                <option>2</option>
                                            @endif
                                        </select>
                                        <span class="form-label">Children</span>
                                        @error('no_of_children')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Price of Room</span>
                                        <input class="form-control" type="text" id="price_per_night"
                                               name="price_per_night" value="${{$room->room_price}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Total Price</span>
                                        <input class="form-control" type="text" id="total_price" name="total_price"
                                               value="0.00" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email"
                                               placeholder="Enter your Email" >
                                        <span class="form-label">Email</span>
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="tel" name="phone"
                                               placeholder="Enter your Phone" >
                                        <span class="form-label">Phone</span>
                                        @error('phone')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button class="submit-btn" type="submit">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
