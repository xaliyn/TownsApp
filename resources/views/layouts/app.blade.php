<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Eventually – TownsApp')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('theme/assets/css/main.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('theme/assets/css/noscript.css') }}" /></noscript>
</head>
<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('theme/assets/js/main.js') }}"></script>
</body>
</html>
