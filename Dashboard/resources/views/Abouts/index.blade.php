@extends('Components.layout')
@section('content')
    <section class="intro mt-5 mb-5 ">
        <div class="mw-50 btn  container p-2 m-2 d-flex justify-content-lg-start text-center inherit-margin">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="22" width="22" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#74C0FC" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                <a href="{{route('abouts.create')}}" class="">Add New Details</a>
            </div>
        </div>
        <h1 class="text-black mb-4 text-center">Details of About Page</h1>
        <div class="bg-image " >
            <div class="mask d-flex align-items-center ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                         style="position: relative; height: auto;">
                                        <table class="table table-striped mb-0">
                                            <thead class="text-black-50" style="background-color: #2976e3;">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">email</th>
                                                <th scope="col">website</th>
                                                <th scope="col">image</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($about_details as $about)
                                                <tr>
                                                    <td>{{$about->id}}</td>
                                                    <td>{{$about->title}}</td>
                                                    <td>{{$about->description}}</td>
                                                    <td>{{$about->address}}</td>
                                                    <td>{{$about->phone}}</td>
                                                    <td>{{$about->email}}</td>
                                                    <td>{{$about->website}}</td>
                                                    <td>{{$about->image}}</td>
                                                    <td class=" d-flex ">
                                                        <!-- Link for edit action -->
                                                        <button class="btn btn-primary btn-sm">
                                                            <a href="{{route('abouts.edit',$about->id)}}" >
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="icon" viewBox="0 0 512 512">
                                                                    <path fill="#000000" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                                                                </svg>
                                                            </a>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
