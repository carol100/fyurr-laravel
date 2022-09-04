<!doctype html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- meta -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- /meta -->

    <!-- styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/layout.main.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/main.responsive.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/main.quickfix.css') }}" />
    <!-- /styles -->

    <!-- favicons -->
    <link rel="shortcut icon" href="/static/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/static/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/static/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/static/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/static/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/static/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/static/ico/favicon.png">
    <!-- /favicons -->

    <!-- scripts -->
    <script src="https://kit.fontawesome.com/af77674fe5.js"></script>
    <script src="{{ asset('assets/js/libs/modernizr-2.8.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}" defer></script>
    <!--[if lt IE 9]><script src="/static/js/libs/respond-1.4.2.min.js"></script><![endif]-->
    <!-- /scripts -->
    @vite('resources/js/app.js')
</head>

<body>

    <!-- Wrap all page content here -->
    <div id="wrap">

        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">🔥</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            @if (Request::url() === 'venues' || Request::url() === 'search_venues' || Request::url() === 'show_venue')
                                <form class="search" method="post" action="/venues/search">
                                    <input class="form-control" type="search" name="search_term"
                                        placeholder="Find a venue" aria-label="Search">
                                </form>
                            @endif
                            @if (Request::url() === 'artists' || Request::url() === 'search_artists' || Request::url() === 'show_artist')
                                <form class="search" method="post" action="/artists/search">
                                    <input class="form-control" type="search" name="search_term"
                                        placeholder="Find an artist" aria-label="Search">
                                </form>
                            @endif
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li @if (Request::url() === 'venues') class="active" @endif><a
                                href="{{ route('venues') }}">Venues</a></li>
                        <li @if (Request::url() === 'artists') class="active" @endif><a
                                href="{{ route('artists') }}">Artists</a></li>
                        <li @if (Request::url() === 'shows') class="active" @endif><a
                                href="{{ route('shows') }}">Shows</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>

        <!-- Begin page content -->
        <main id="content" role="main" class="container">

            @if (session('message'))
                <div class="alert alert-block alert-info fade in">
                    <a class="close" data-dismiss="alert">&times;</a>
                    {{ session('message') }}
                </div>
            @endif

            @yield('content')

        </main>

    </div>

    <div id="footer">
        <div class="container">
            <p>Fyyur &copy; All Rights Reserved.</p>
            @yield('footer')
        </div>
    </div>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write(
            '<script type="text/javascript" src="{{ asset('assets/js/libs/jquery-1.11.1.min.js') }}"><\/script>')
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/libs/bootstrap-3.1.1.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins.js') }}" defer></script>

</body>

</html>
