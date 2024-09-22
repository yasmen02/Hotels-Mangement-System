@extends('Components.layout')
@section('content')
    <section class="intro mt-5 mb-5">

        <div class="bg-image h-100" >
            <div class="mask d-flex flex-column align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                         style="position: relative;">
                                        <table class="table table-striped mb-0">
                                            <thead class="text-black-50" style="background-color: #2976e3;">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Room ID</th>
                                                <th scope="col">User ID</th>
                                                <th scope="col">Check In</th>
                                                <th scope="col">Check Out</th>
                                                <th scope="col">email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">No of adult</th>
                                                <th scope="col">No of children</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bookings as $booking)
                                                <tr>
                                                    <td>{{$booking->id}}</td>
                                                    <td>{{$booking->room_id}}</td>
                                                    <td>{{$booking->user_id}}</td>
                                                    <td>{{$booking->check_in_date}}</td>
                                                    <td>{{$booking->check_out_date}}</td>
                                                    <td>{{$booking->email}}</td>
                                                    <td>{{$booking->phone}}</td>
                                                    <td>{{$booking->no_of_adults}}</td>
                                                    <td>{{$booking->no_of_children}}</td>
                                                    <td>{{$booking->total_price}}</td>
                                                    <td>{{$booking->status}}</td>
                                                    <td>
                                                        <form method="POST" action="{{route('booking.destroy',$booking->id)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"  class="btn btn-danger btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                     width="20.25" viewBox="0 0 448 512">
                                                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path fill="#000000"
                                                                          d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        <button type="submit">
                                                            <a href="{{route('booking.edit',$booking->id)}}" class="btn btn-primary btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                     width="20.25" viewBox="0 0 512 512">
                                                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path fill="#000000"
                                                                          d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
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

