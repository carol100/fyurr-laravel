@extends('layout')

@section('title')
    Fyurr | Artists
@endsection

@section('content')
    <ul class="items">
        @foreach ($artists as $artist)
            <li>
                <a href="/artists/{{ $artist->id }}">
                    <i class="fas fa-users"></i>
                    <div class="item">
                        <h5>
                            {{ "$artist->first_name $artist->last_name ($artist->stage_name)" }}
                        </h5>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
