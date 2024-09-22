@extends('Components.layout')
@section('content')
    <section class="intro mt-5 mb-5">
        <h1 class="text-black-50 mb-4"></h1>
        <div class="bg-image " >
            <div class="mask d-flex align-items-center ">
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Stars</th>
                                                <th scope="col">Hotel Image</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($hotels as $hotel)
                                                <tr>
                                                    <td>{{$hotel->id}}</td>
                                                    <td>{{$hotel->name}}</td>
                                                    <td>{{$hotel->address}}</td>
                                                    <td>@for($i=0;$i<$hotel->stars;$i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="12" width="13.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                                        @endfor
                                                    </td>
                                                    <td>{{$hotel->hotel_image}}</td>
                                                    <td>{{$hotel->contact_number}}</td>
                                                    <td class="d-flex">
                                                        <form method="POST" action="{{ route('hotels.show', ['slug' => $hotel->slug]) }}">
                                                            @csrf
                                                            @method('GET')
                                                            <button type="submit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                     width="20.25" viewBox="0 0 576 512">
                                                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path fill="#000000"
                                                                          d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        <form method="POST" action="{{route('hotels.destroy',$hotel->id)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                                     width="20.25" viewBox="0 0 448 512">
                                                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                    <path fill="#000000"
                                                                          d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                                                </svg>
                                                            </button>
                                                        </form>

                                                            <button type="submit" class="btn btn-primary btn-sm">
                                                                <a href="{{route('hotels.edit',$hotel->id)}}">
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

