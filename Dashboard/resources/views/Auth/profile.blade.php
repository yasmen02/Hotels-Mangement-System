@extends('components.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb py-3 px-3">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href=""> My Profile</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-12 bg-white p-0 px-3 py-3 mb-3">
                        <div class="d-flex flex-column align-items-center">
                            <img class="photo"
                                 style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;"
                                 src="{{asset('images/profile.png')}}" alt="">
                            <p class="fw-bold h4 mt-3">{{Auth::guard('admin')->user()->name}}</p>
                            <p class="text-muted">{{Auth::guard('admin')->user()->email}}</p>
                            <p class="text-muted mb-3">{{Auth::guard('admin')->user()->role }}</p>
                            <div class="d-flex">
                                <div class="btn btn-primary follow me-2"><a class="text-white" href="{{route('admin.edit',Auth::guard('admin')->user()->id)}}">Edit My
                                        Information</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 ps-md-4 mt-5">
                <div class="row">
                    <div class="col-12 bg-white px-3 mb-3 pb-3">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="py-2">Full Name</p>
                            <p class="py-2 text-muted">{{Auth::guard('admin')->user()->name}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="py-2">Email</p>
                            <p class="py-2 text-muted">{{Auth::guard('admin')->user()->email}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="py-2">Role</p>
                            <p class="py-2 text-muted">{{Auth::guard('admin')->user()->role}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="py-2">Password</p>
                            <p class="py-2 text-muted">***********</p>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::guard('admin')->user()->role =='superadmin')
                <div class="col-12 bg-white px-3 mb-3 pb-3">
                    <div class="d-flex justify-content-between">
                    <h5 class="py-3">Admins</h5>
                        <div class="py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#74C0FC" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                             <a href="{{route('admin.create')}}" class="">Add New Admin</a>
                        </div>
                    </div>
                    </div>
                    @include('message')
                    <div class="transaction-list">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->id}}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->role}}</td>
                                        <td>{{ $admin->status }}</td>
                                        <td class="d-flex">
                                            <form method="POST" action="{{route('admin.delete',$admin->id)}}" class="icon-button">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn  btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="icon" w viewBox="0 0 448 512">
                                                        <path fill="#000000" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                                    </svg>
                                                </button>
                                            </form>

                                            <!-- Link for edit action -->
                                            <button class="btn bt  btn-sm">
                                                <a href="{{ route('admin.edit', $admin->id) }}" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="icon" viewBox="0 0 512 512">
                                                        <path fill="#000000" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                                                    </svg>
                                                </a>
                                            </button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
