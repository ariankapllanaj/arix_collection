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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .welcome {
            background-image: url('{{ asset('images/scroll/minecraft.jpg') }}');
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            height: calc(100vh - 30px) !important;
            margin-top: 30px !important;
            width: 100vw !important;
            padding: 0 !important;
            margin: 0 !important;
            box-sizing: border-box !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
        }

        #main-content {
            margin: 0;
            padding: 0;
            width: 100%;
        }
    </style>

</head>

<body>
    <div id="loading-screen">
        @include('pages.ps1startup')
    </div>

    <div id="main-content" style="display: none;">
        @include('components.topbar')
        <div class="welcome">
            <h1 style="color: green">Welcome</h1>
        </div>
    </div>
</body>

</html>
<script>
    // Inspired by the loader on the PS4 which randomises the symbols that appear
    var iconList = ['triangle', 'square', 'cross', 'circle'],
        icons = document.getElementsByClassName('icon'),
        ready = 0,
        i, j;

    function changeIcon(icon, iconParent) {
        var randomIcon = '#ps_' + iconList[Math.floor(Math.random() * iconList.length)],
            iconNum = parseInt(icon.id.substr(3));

        if (ready < iconNum) { // We make sure every icon is done animating in the right order
            ready = iconNum;
        }

        iconParent.classList.remove('animate');
        icon.setAttribute('xlink:href', randomIcon);

        if (ready === 4) { // If all symbols are changed, start the animation anew
            setTimeout(function() {
                for (j = 0; j < icons.length; j++) {
                    icons[j].classList.add('animate');
                }
                ready = 0;
            }, 0);
        }
    }

    for (i = 0; i < icons.length; i++) { // Loop through all the icons
        icons[i].addEventListener('animationend', function(e) {
            changeIcon(e.target.querySelector('.svg-icon'), e.target);
        });
    }

    // Toggler, quick and easy
    document.querySelector('button').addEventListener('click', function() {
        document.querySelector('.loader').classList.toggle('oneline');
    });
</script>
