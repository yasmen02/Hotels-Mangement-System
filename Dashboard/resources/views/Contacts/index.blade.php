@extends('Components.layout')
@section('content')
    <section class="intro mt-5 mb-5 ">
        <h1 class="text-black mb-4 text-center">Details of Contact Page</h1>
        <div class="bg-image" >
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
                                                <th scope="col">User id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Message</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($contact_details as $contact)
                                                <tr>
                                                    <td>{{$contact->id}}</td>
                                                    <td>{{$contact->user_id}}</td>
                                                    <td>{{$contact->name}}</td>
                                                    <td>{{$contact->email}}</td>
                                                    <td>{{$contact->phone}}</td>
                                                    <td>{{$contact->message}}</td>

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
