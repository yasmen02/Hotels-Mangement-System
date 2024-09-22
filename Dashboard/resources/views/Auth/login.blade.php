<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('images/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="flex h-screen mb-5 mt-5">
        <div class="container-fluid bg-light w-75 d-flex align-items-center justify-content-center">
            <div class="col-md-6 p-4">
                <h1 class="text-center display-4 mb-4">Admin Login</h1>
                <div class="mb-4">
                    <p class="text-muted">Don't have an account?
                        <a href="{{route('register')}}" class="text-primary">Sign Up</a>
                    </p>
                </div>
                <form action="{{ route('login.store') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                        {{$message}}
                        @enderror
                    </div>

                    <!-- Optional: Include fields for role and status if needed for the login process -->
                    <input type="hidden" name="role" value="admin"> <!-- If role is fixed for admins -->
                    <input type="hidden" name="status" value="active"> <!-- Set status as active -->

                    <div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="text-center">
                    <p class="text-muted">Forgot password?
                        <a href="" class="text-dark">Reset Password</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
