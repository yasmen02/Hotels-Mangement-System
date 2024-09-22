@extends('components.layout')
@section('content')
    <div class="flex h-screen mb-5 mt-5">
        <div class="container-fluid bg-light d-flex align-items-center justify-content-center">
            <div class="col-md-6 p-4">
                <h1 class="text-center display-4 mb-4">Sign Up</h1>
                <div class="mb-4">
                    <p class="text-muted">Already have an account?
                        <a href="" class="text-primary">Login</a>
                    </p>
                </div>
                <form action="{{ route('register.store') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
{{--                        <x-form-error name="email" />--}}
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
{{--                        <x-form-error name="password" />--}}
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
{{--                        <x-form-error name="confirm_password" />--}}
                    </div>
                    <input type="hidden" name="created_at" value="{{ now()->format('Y-m-d H:i:s') }}"> <!-- Current date and time -->

                    <div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
