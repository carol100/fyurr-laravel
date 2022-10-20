@extends('layout')

@section('title')
    {{ "$artist->stage_name | Artist" }}
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="monospace">
                {{ "$artist->first_name $artist->last_name" }}
            </h1>
            <p class="subtitle">
                ID: {{ $artist->id }}
            </p>
            <div class="genres">
                @foreach ($artist->genres as $genre)
                    <span class="genre">{{ $genre }}</span>
                @endforeach
            </div>
            <p>
                <i class="fas fa-phone-alt"></i> {{ $artist->phone_number }}
            </p>
            <p>
                <i class="fab fa-facebook-f"></i>
                @if ($artist->facebook_link)
                    <a href="{{ $artist->facebook_link }}" target="_blank">{{ $artist->facebook_link }}</a>
                @else
                    No Facebook Link
                @endif
            </p>
            <p>
                <i class="fas fa-link"></i>
                @if ($artist->instagram_link)
                    <a href="{{ $artist->instagram_link }}" target="_blank">{{ $artist->instagram_link }}</a>
                @else
                    No Instagram Link
                @endif
            </p>
            @if ($artist->available)
                <p class="seeking">
                    <i class="fas fa-sun"></i> Available.
                </p>
            @else
                <p class="not-seeking">
                    <i class="fas fa-moon"></i> Not available.
                </p>
            @endif
        </div>
        <div class="col-sm-6">
            <img src="{{ asset('storage/' . $artist->image) }}" alt="Artist Image" />
        </div>
    </div>
    {{-- <section>
        <h2 class="monospace">{{ artist.upcoming_shows_count }} Upcoming {% if artist.upcoming_shows_count == 1 %}Show{% else %}Shows{% endif %}</h2>
        <div class="row">
            {%for show in artist.upcoming_shows %}
            <div class="col-sm-4">
                <div class="tile tile-show">
                    <img src="{{ show.venue_image_link }}" alt="Show Venue Image" />
                    <h5><a href="/venues/{{ show.venue_id }}">{{ show.venue_name }}</a></h5>
                    <h6>{{ show.start_time|datetime('full') }}</h6>
                </div>
            </div>
            {% endfor %}
        </div>
    </section>
    <section>
        <h2 class="monospace">{{ artist.past_shows_count }} Past {% if artist.past_shows_count == 1 %}Show{% else %}Shows{% endif %}</h2>
        <div class="row">
            {%for show in artist.past_shows %}
            <div class="col-sm-4">
                <div class="tile tile-show">
                    <img src="{{ show.venue_image_link }}" alt="Show Venue Image" />
                    <h5><a href="/venues/{{ show.venue_id }}">{{ show.venue_name }}</a></h5>
                    <h6>{{ show.start_time|datetime('full') }}</h6>
                </div>
            </div>
            {% endfor %}
        </div>
    </section> --}}

    <a href="{{ route('artists.edit', ['artist' => $artist->id]) }}">
        <button class="btn btn-primary btn-lg">Edit</button>
    </a>
@endsection
