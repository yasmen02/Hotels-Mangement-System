@extends('components.layout')
@section('content')
    <div class="flex h-screen mb-5 mt-5">
        <div class="container-fluid bg-light d-flex align-items-center justify-content-center">
            <div class="col-md-6 p-4">
                <h1 class="text-center display-4 mb-4">Edit Profile</h1>
                <div class="mb-4">
                    <p class="text-muted">Want to go back?
                        <a href="/profile" class="text-primary">Back to Profile</a>
                    </p>
                </div>
                <form action="{{ route('myprofile.update', auth()->user()->id)}} " method="POST" class="mb-4">
                    @csrf
                    @method('PUT') <!-- Assuming you're using PUT for updates -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}">
                        <x-form-error name="name" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                        <x-form-error name="email" />
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ old('email') }}">
                        <x-form-error name="phone_number" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password (leave blank to keep current)</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <x-form-error name="password" />
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        <x-form-error name="confirm_password" />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
