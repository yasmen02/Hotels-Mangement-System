@extends('components.layout')
@section('content')
    <div class="flex h-screen p-5">
        <div class="container-fluid bg-light d-flex align-items-center justify-content-center">
            <div class="col-md-6 p-4">
                <h1 class="text-center display-4 mb-4">Login</h1>
                <div class="mb-4">
                    <p class="text-muted">Don't have an account?
                        <a href="/register" class="text-primary">Sign Up</a>
                    </p>
                </div>
                <form action="{{route('login.store')}}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                        <x-form-error name="email" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <x-form-error name="password" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="text-center">
                    <p class="text-muted">Forget password?
                        <a href="{{route('password.request')}}" class="text-dark">Reset Password</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection
