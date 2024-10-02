@extends('components.layout')
@section('content')
    <div class="container mt-5 p-5">
        <h2>Reset Password</h2>
        <form action="{{ route('password.update') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <x-form-error name="email" />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <x-form-error name="password" />
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                <x-form-error name="confirm_password" />
            </div>


            <div>
                <button type="submit" class="btn btn-primary">Reset</button>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success mt-3">{{ session('status') }}</div>
        @endif
    </div>
@endsection
