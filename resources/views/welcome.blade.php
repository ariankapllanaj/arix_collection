<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arix Collection</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo/favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- AOS Library-->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ps1startup.css') }}" rel="stylesheet">

</head>

<body>
    <div id="loading-screen">
        @include('pages.ps1startup')
    </div>

    <div id="main-content" style="display: none;">
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hasSeenAnimation = localStorage.getItem('hasSeenPS1Animation');

            if (hasSeenAnimation) {
                document.getElementById('loading-screen').style.display = 'none';
                const mainContent = document.getElementById('main-content');
                mainContent.style.display = 'block';
                mainContent.classList.add('show');
            } else {
                const loadingScreen = document.getElementById('loading-screen');
                const mainContent = document.getElementById('main-content');

                setTimeout(() => {
                    loadingScreen.style.display = 'none';
                    mainContent.style.display = 'block';
                    mainContent.classList.add('show');
                    localStorage.setItem('hasSeenPS1Animation', 'true');
                }, 7500); // Adjust duration based on your animation length
            }
        });
    </script>
</body>

</html>