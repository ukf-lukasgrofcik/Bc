<!doctype html>
<html lang="sk">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <meta name="author" content="Lukáš Grofčík">

    <title>{{ env('APP_NAME') }}@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300%3b400%3b500%3b600%3b700&display=swap" rel="stylesheet">
    <link href="https://unicons.iconscout.com/release/v3.0.0/css/line.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" type="text/css">
    @yield('css')
</head>

<body class="authentication-bg">
    @yield('content')

    <script src="{{ asset('js/script.min.js') }}" type="text/javascript"></script>
    @yield('js')
</body>

</html>
