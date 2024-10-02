<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHADMIN </title>
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
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHADMIN</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="{{asset('images/profile.png')}}" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">Yasmen Zuheer</h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-light navbar-light">
                    <a href="index.html" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary">
                            <i class="fas fa-hashtag me-2" style="color: #009CFF;"></i>
                            DASH ADMIN
                        </h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="{{asset('images/profile.png')}}" alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-3">
                            @if(Auth::guard('admin')->check())
                                <h6 class="mb-0">{{ Auth::guard('admin')->user()->name }}</h6>
                            @endif
                            <span>Admin</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="/" class="nav-item nav-link active">
                            <i class="fas fa-tachometer-alt me-2" style="color: #009CFF;"></i>
                            Dashboard
                        </a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-users me-2" style="color: #009CFF;"></i>
                                Users
                            </a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="{{route('users.index')}}" class="dropdown-item">All Users</a>
                                <a href="{{route('users.create')}}" class="dropdown-item">Add New Users</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-hotel me-2" style="color: #009CFF;"></i>
                                Hotels
                            </a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="{{route('hotels.index')}}" class="dropdown-item">All Hotels</a>
                                <a href="{{route('hotels.create')}}" class="dropdown-item">Add New Hotel</a>
                            </div>
                        </div>
                        <a href="{{route('booking.index')}}" class="nav-item nav-link">
                            <i class="fas fa-book me-2" style="color: #009CFF;"></i>
                            Booking
                        </a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-pencil-alt me-2" style="color: #009CFF;"></i>
                                Blogs & Article
                            </a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="{{route('blogs.index')}}" class="dropdown-item">All Blogs</a>
                                <a href="{{route('blogs.create')}}" class="dropdown-item">Add New Blog</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-images me-2" style="color: #009CFF;"></i>
                                Banners
                            </a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="{{route('banners.index')}}" class="dropdown-item">All Banners</a>
                                <a href="{{route('banners.create')}}" class="dropdown-item">Add New Banner</a>
                            </div>
                        </div>
                        <a href="{{route('payment.index')}}" class="nav-item nav-link">
                            <i class="fas fa-credit-card me-2" style="color: #009CFF;"></i>
                            Payment
                        </a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="far fa-file-alt me-2" style="color: #009CFF;"></i>
                                Pages
                            </a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="{{route('abouts.index')}}" class="dropdown-item">Home & About Pages</a>
                                <a href="{{route('contacts.index')}}" class="dropdown-item">Contact Pages</a>
                            </div>
                        </div>

                        @guest('admin')
                            <a href="{{ route('login') }}" class="nav-item nav-link">
                                <i class="fas fa-sign-in-alt me-2" style="color: #009CFF;"></i>
                                Login
                            </a>
                        @endguest
                        @auth('admin')
                            <a href="{{route('logout')}}" class="nav-item nav-link">
                                <i class="fas fa-sign-in-alt me-2" style="color: #009CFF;"></i>
                                Logout
                            </a>
                        @endauth
                    </div>
                </nav>
            </div>
        </nav>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input class="form-control border-0" type="search" placeholder="Search">
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        @foreach($messages as $message)
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="{{asset('images/profile.png')}}" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">{{ $message->name }} sent you a message</h6>
                                        <small>{{ $message->created_at->diffForHumans() }}</small> <!-- Displays time ago -->
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                        @endforeach
                        <a href="{{route('contacts.index')}}" class="dropdown-item text-center">See all message</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="{{asset('images/profile.png')}}" alt="" style="width: 40px; height: 40px;">
                        @if(Auth::guard('admin')->check())
                            <span class="d-none d-lg-inline-flex">{{ Auth::guard('admin')->user()->name }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{route('profile')}}" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
