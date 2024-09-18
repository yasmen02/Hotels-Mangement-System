@extends('Components.layout')
@section('content')
    <section class="vh-100 mt-5 mb-5" style="background-color: #ffffff;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">
                    <h1 class="text-black-50 mb-4">Add New User</h1>

                    <form action="{{route('users.store')}}" method="POST" class="card" style="border-radius: 15px;" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Full name</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" name="name" class="form-control form-control-lg"/>
                                </div>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Email address</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="email" name="email" class="form-control form-control-lg"
                                           placeholder="example@example.com"/>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Phone Number</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="tel" id="phone_number" class="form-control form-control-lg" name="phone_number" placeholder="+962" >
                                    @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Password</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input class="form-control form-control-lg" name="password" id="formFileLg" type="password"/>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Confirm Password</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input class="form-control form-control-lg" name="confirm_password" id="formFileLg" type="password"/>
                                    @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="px-5 py-4">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-lg">Add User
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
