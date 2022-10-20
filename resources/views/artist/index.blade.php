@extends('layout')

@section('title')
    Fyurr | Artists
@endsection

@section('content')
    <a href="{{ route('home') }}"><button class="btn btn-secondary btn-sm">Back</button></a>

    <ul class="items" style="margin-top: 15px">
        @foreach ($artists as $artist)
            <li>
                <a href="{{ route('artists.show', $artist->id) }}">
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
