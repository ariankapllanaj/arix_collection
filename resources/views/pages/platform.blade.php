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
    <div class="container my-4">
        <h1 class="mb-3">{{ $platform->platform_name }}</h1>

        <h2 class="mt-5">Generations without link</h2>
        <ul class="list-group">
            @forelse($platform->generations as $generation)
                <li class="list-group-item">
                    {{ $generation->generation_name }}
                </li>
            @empty
                <li class="list-group-item text-muted">No generations available for this platform.</li>
            @endforelse
        </ul>

        <h2 class="mt-5">Generations</h2>
        <ul class="list-group">
            @forelse($platform->generations as $generation)
                <li class="list-group-item">
                    <a href="{{ route('pages.generation', ['slug' => $generation->slug]) }}">
                        {{ $generation->generation_name }}
                    </a>
                </li>
            @empty
                <li class="list-group-item text-muted">No generations available for this platform.</li>
            @endforelse
        </ul>
    </div>
</body>

</html>
