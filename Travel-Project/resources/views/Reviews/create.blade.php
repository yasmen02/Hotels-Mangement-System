@extends('components.layout')
@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card bg-dark text-center mb-5 p-4">
            <h4 class="text-white mb-4">Rate Your Driver</h4>
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <input type="hidden" name="hotel_id" value="1">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div class="rate mb-4">
                    <h6 class="text-white mb-2">How would you rate your experience?</h6>
                    <div class="d-flex justify-content-center">
                        <div class="rating">
                            <input type="radio" name="rating" value="5" id="5" required>
                            <label for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4" required>
                            <label for="4">☆</label>
                            <input type="radio" name="rating" value="3" id="3" required>
                            <label for="3">☆</label>
                            <input type="radio" name="rating" value="2" id="2" required>
                            <label for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1" required>
                            <label for="1">☆</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="comment" class="text-white">Your Comment</label>
                    <textarea name="comment" id="comment" class="form-control" rows="4" placeholder="Leave your comment here..." required></textarea>
                </div>

                <input type="hidden" name="review_date" value="{{ now()->format('Y-m-d H:i:s') }}"> <!-- Current date and time -->

                <div class="buttons mt-4">
                    <button type="submit" class="btn btn-warning btn-block">Submit Review</button>
                </div>
            </form>
        </div>
    </div>
@endsection
