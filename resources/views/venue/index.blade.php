@extends('/layout')
@section('title')
    Fyurr | Venues
@endsection

@section('content')
    <a href="{{ route('venues.create') }}"><button class="btn btn-secondary btn-sm">Add Venue</button></a>

    <ul class="items">
        @foreach ($venues as $venue)
            <li>
                <a href="/venues/{{ $venue->id }}">
                    <i class="fas fa-music"></i>
                    <div class="item">
                        <h5>{{ $venue->name }}</h5>
                    </div>
                </a>
            </li>
        @endforeach

    </ul>
@endsection
