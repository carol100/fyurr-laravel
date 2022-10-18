@extends('layout')

@section('title')
    Fyyur | Artists Search
@endsection

@section('content')
    <h3>Number of search results for "{{ request()->query('search_term') }}": {{ count($artists) }}</h3>
    <ul class="items">
        @foreach ($artists as $artist)
            <li>
                <a href="#">
                    <i class="fas fa-users"></i>
                    <div class="item">
                        <h5>{{ "$artist->first_name $artist->last_name ($artist->stage_name)" }}</h5>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
