<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $platform->platform_name }}</title>
    @include('components.bootstrap')

    <style>
        body {
            margin-top: 56px;
        }
    </style>
</head>

<body>
    @include('components.topbar')

    <div class="container mt-5">
        <p>Welcome to the {{ $platform->platform_name }} page!</p>
    </div>
</body>

</html>
