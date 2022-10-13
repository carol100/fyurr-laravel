@extends('layout')
@section('title')
    Fyurr | Venue
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1 class="monospace">
                {{ $venue->name }}
            </h1>
            <p class="subtitle">
                ID: {{ $venue->id }}
            </p>

            <p>
                <i class="fas fa-globe-americas"></i> {{ $venue->location }},
            </p>
            <p>
                <i class="fas fa-address-card"></i> {{ $venue->address ? $venue->address : '' }}
            </p>
            <p>
                <i class="fas fa-map-marker"></i> {{ $venue->description ? $venue->description : '' }}
            </p>
            <p>
                <i class="fas fa-phone-alt"></i> {{ $venue->phone_number ? $venue->phone_number : 'No contacts' }}
            </p>
            <p>
                <i class="fas fa-user"></i>
                {{ $venue->contact_person_name ? $venue->contact_person_name : 'No contact Person details' }}
            </p>
            <p>
                <i class="fas fa-envelope-open"></i> {{ $venue->email ? $venue->email : 'No email' }}
            </p>
            <p>
                <i class="fab fa-facebook-f"></i>
                <a href="{{ $venue->facebook_link }}" target='_blank'>{{ $venue->facebook_link }}</a>
            </p>

            @if ($venue->available)
                <div class="seeking">
                    <p class="lead">Currently seeking talent</p>
                    <div class="description">
                        <i class="fas fa-quote-left"></i> {{ $venue->availability }} <i class="fas fa-quote-right"></i>
                    </div>
                </div>
            @else
                <p class="not-seeking">
                    <i class="fas fa-moon"></i> Not currently seeking talent
                </p>
            @endif
        </div>
        <div class="col-sm-6">
            @if ($venue->image)
                <img src="{{ asset('storage/' . $venue->image) }}"alt="Venue Image" />
            @else
                <img src="{{ asset('assets/img/default-image.png') }}" alt="">
            @endif
        </div>

    </div>
    <section>
        <h2 class="monospace"> {{ 00 }}Upcoming
            {{-- {% if venue.upcoming_shows_count == 1 %}Show{% else %}Shows{% endif %}</h2> --}}
            <div class="row">
                {{-- {%for show in venue.upcoming_shows %}
            <div class="col-sm-4">
                <div class="tile tile-show">
                    <img src="{{ show . artist_image_link }}" alt="Show Artist Image" />
                    <h5><a href="/artists/{{ show . artist_id }}">{{ show . artist_name }}</a></h5>
                    <h6>{{ (show . start_time) | datetime('full') }}</h6>
                </div>
            </div>
            {% endfor %} --}}
            </div>
    </section>
    <section>
        <h2 class="monospace">{{ 00 }} Past
            {{-- {% if venue.past_shows_count == 1 %}Show{% else %}Shows{% endif %}</h2> --}}
            <div class="row">
                {{-- {%for show in venue.past_shows %}
            <div class="col-sm-4">
                <div class="tile tile-show">
                    <img src="{{ show . artist_image_link }}" alt="Show Artist Image" />
                    <h5><a href="/artists/{{ show . artist_id }}">{{ show . artist_name }}</a></h5>
                    <h6>{{ (show . start_time) | datetime('full') }}</h6>
                </div>
            </div>
            {% endfor %} --}}
            </div>
    </section>

    <a href="/venues/{{ $venue->id }}/edit"><button class="btn btn-primary btn-lg">Edit</button></href=>
    @endsection
