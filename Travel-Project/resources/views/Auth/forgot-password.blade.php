@extends('components.layout')
@section('content')
    <div class="flex h-screen mb-5 mt-5">
        <div class="container-fluid bg-light d-flex align-items-center justify-content-center">
            <div class="col-md-6 p-4">
                <h1 class="text-center display-4 mb-4">Reset Password</h1>
                <div class="mb-4">
                    <p class="text-muted">Remember your password?
                        <a href="/login" class="text-primary">Login</a>
                    </p>
                </div>
                @if (session('status'))
                    <div class="alert alert-success mb-4">{{ session('status') }}</div>
                @endif

                <form action="{{ route('password.email') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}" required>
                        <x-form-error name="email" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                    </div>
                </form>
                <div class="text-center">
                    <p class="text-muted">Go back to
                        <a href="/login" class="text-dark">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
