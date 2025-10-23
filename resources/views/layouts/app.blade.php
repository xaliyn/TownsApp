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
    <body class="is-preload">
    <!-- Header / Navigation -->
    <header id="header">
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/database') }}">Database</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
                <li><a href="{{ url('/graph') }}">Graph</a></li>
                <li><a href="{{ url('/crud') }}">CRUD</a></li>
                <li><a href="{{ url('/admin') }}">Admin</a></li>
            </ul>
        </nav>
    </header>

    <!-- Wrapper -->
    <div id="wrapper">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; TownsApp Laravel Project</li>
            <li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('theme/assets/js/main.js') }}"></script>
</body>

