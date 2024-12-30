<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        /* Navigation button hover effect */
        .nav-link {
            position: relative;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .nav-link:hover {
            color: #88C5AD;
            /* Change to your desired hover color */
            transform: translateY(-3px);
            /* Slight lift effect */
        }

        .nav-link::after {
            content: "";
            display: block;
            width: 0;
            height: 2px;
            background: #88C5AD;
            transition: width 0.3s ease;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .nav-link:hover::after {
            width: 100%;
            /* Underline animation */
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo/favicon.ico') }}" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top rounded-circle">
                </a>
                <!-- Toggle Button for Small Screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Collapsible Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <!-- Dynamically Render Platforms -->
                        @foreach ($platforms as $platform)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pages.platform', $platform->platform_name) }}">{{ $platform->platform_name }}</a>
                            </li>
                        @endforeach

                        @auth
                            <!-- Show this if the user is logged in -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <!-- Show this if the user is not logged in -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>
