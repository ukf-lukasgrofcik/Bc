<!doctype html>
<html lang="sk">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bakalárska práca"/>
    <meta name="author" content="Lukáš Grofčík"/>

    <title>{{ env('APP_NAME') }} @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300%3b400%3b500%3b600%3b700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}" type="text/css" />
    @yield('css')
</head>

<body>
    <div id="layout-wrapper">
        @include('system._partials._topbar')
        @include('system._partials._menu')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('system._partials._footer')
            @include('system._partials._delete_modal')
        </div>
    </div>

    <script src="{{ asset('js/script.min.js') }}"></script>
    @yield('js')
</body>
</html>
