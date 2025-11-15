<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Eventually – TownsApp')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ secure_asset('theme/assets/css/main.css') }}" />
    <noscript>
        <link rel="stylesheet" href="{{ secure_asset('theme/assets/css/noscript.css') }}" />
    </noscript>
</head>

<body class="is-preload">

    <!-- Header / Navigation -->
    <header id="header">
        <nav>
            <ul>
               <li><a href="{{ secure_url('/') }}">Home</a></li>
               <li><a href="{{ secure_url('/database') }}">Database</a></li>
               <li><a href="{{ secure_url('/contact') }}">Contact</a></li>
               <li><a href="{{ secure_url('/graph') }}">Graph</a></li>
               <li><a href="{{ secure_url('/crud') }}">CRUD</a></li>

            @if(Auth::check())
               <li><a href="{{ secure_url('/messages') }}">Messages</a></li>
            @endif

            @if(Auth::check() && Auth::user()->role == 'admin')
               <li><a href="{{ secure_url('/admin') }}">Admin</a></li>
            @endif

            @guest
              <li><a href="{{ secure_url('/login') }}">Login</a></li>
              <li><a href="{{ secure_url('/register') }}">Register</a></li>
            @else
              <li>
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     Logout ({{ Auth::user()->name }})
                  </a>
             </li>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                  @csrf
             </form>
            @endguest
            </ul>
        </nav>
    </header>

    <!-- Wrapper -->
    <div id="wrapper" style="overflow-y:auto; max-height:90vh;">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; TownsApp Laravel Project</li>
            <li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>

    <!-- Scripts (HTTPS-safe) -->
    <script src="{{ secure_asset('theme/assets/js/main.js') }}"></script>
</body>
</html>
