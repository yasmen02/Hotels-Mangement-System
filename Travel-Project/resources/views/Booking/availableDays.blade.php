@extends('components.layout')
@section('content')
    <div class="container">
        <h1>Availability for Room {{ $room_id }}</h1>
        @foreach ($calendar as $month)
            <h2>{{ $month['month'] }}</h2>
            <table class="table">
                <thead>
                <tr>
                    @foreach (['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $dayName)
                        <th>{{ $dayName }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                <tr>
                    @php
                        $firstDay = \Carbon\Carbon::parse($month['days'][0]['date'])->dayOfWeek;
                        $emptyCells = $firstDay;
                    @endphp
                    @for ($i = 0; $i < $emptyCells; $i++)
                        <td></td>
                    @endfor

                    @foreach ($month['days'] as $day)
                        <td class="{{ $day['isBooked'] ? 'unavailable' : '' }}">
                            {{ \Carbon\Carbon::parse($day['date'])->format('j') }}
                        </td>
                        @if (($emptyCells + $loop->index + 1) % 7 === 0)
                </tr><tr>
                    @endif
                    @endforeach
                </tr>
                </tbody>
            </table>
        @endforeach
    </div>

    <style>
        .unavailable {
            background-color: rgba(128, 128, 128, 0.27);
            color: white;
        }
    </style>
@endsection
