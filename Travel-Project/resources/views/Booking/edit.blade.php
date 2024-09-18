@extends('components.layout')
@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                <div class="row">
                    <div class="booking-form">
                        <div class="form-header">
                            <h1>Edit your reservation</h1>
                        </div>
                        <form action="{{route('booking.update',['id'=>$booking_item->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="hidden" name="room_id" value="{{$booking_item->id}}">
                                <input type="hidden" name="user_id" value="{{ $booking_item->user_id }}">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">No of Room</span>
                                        <input class="form-control" type="text" id="room_id" name="room_id" value="{{$booking_item->room_id}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Type of Room</span>
                                        <input class="form-control" type="text" id="room_type" name="room_type" value="{{$room->room_type}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="date" id="check_in_date" name="check_in_date" required>
                                        <span class="form-label">Check In</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="date" id="check_out_date" name="check_out_date" required>
                                        <span class="form-label">Check Out</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" id="no_of_adults" name="no_of_adults" required>
                                            <option value="{{$booking_item->no_of_adults}}" selected hidden>No of Adults</option>
                                            <option>1</option>
                                            @if($room->room_type!='Single')
                                                <option>2</option>
                                            @elseif($room->room_type!='Single' and $room->room_type!='Double')
                                                <option>3</option>
                                            @endif
                                        </select>
                                        <span class="form-label">Adults</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" id="no_of_children" name="no_of_children" required>
                                            <option value="{{$booking_item->no_of_children}}" selected hidden>No of Children</option>
                                            <option>0</option>
                                            @if($room->room_type!='Single')
                                                <option>1</option>
                                            @elseif($room->room_type!='Single' and $room->room_type!='Double')
                                                <option>2</option>
                                            @endif
                                        </select>
                                        <span class="form-label">Children</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Price of Room</span>
                                        <input class="form-control" type="text" id="price_per_night" name="price_per_night" value="${{$room->room_price}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Total Price</span>
                                        <input class="form-control" type="text" id="total_price" name="total_price" value="0.00" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" placeholder="Enter your Email" value="{{$booking_item->email}}" required>
                                        <span class="form-label">Email</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="tel" name="phone" placeholder="Enter your Phone" value="{{$booking_item->phone}}" required>
                                        <span class="form-label">Phone</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button class="submit-btn" type="submit">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
