@extends('layout')

@section('title')
    Fyurr
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h1>Fyyur 🔥</h1>
            <p class="lead">Where musical artists meet musical venues.</p>
            <h3>
                <a href="/venues"><button class="btn btn-primary btn-lg">Find a venue</button></a>
                <a href="/venues/create"><button class="btn btn-default btn-lg">Post a venue</button></a>
            </h3>
            <h3>
                <a href="/artists"><button class="btn btn-primary btn-lg">Find an artist</button></a>
                <a href="/artists/create"><button class="btn btn-default btn-lg">Post an artist</button></a>
            </h3>
            <p class="lead">Publicize about your show for free.</p>
            <h3>
                <a href="/shows/create"><button class="btn btn-default btn-lg">Post a show</button></a>
            </h3>
        </div>
        <div class="col-sm-6 hidden-sm hidden-xs">
            <img id="front-splash" src="{{ asset('assets/img/front-splash.jpg') }}" alt="Front Photo of Musical Band" />
        </div>
    </div>
@endsection
