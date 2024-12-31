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

        .background-banner {
            position: relative;
            width: 100%;
            height: 100px;
            background-size: cover;
            background-position: center;
        }

        .background-banner h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            z-index: 2;
            /* Ensure text appears on top */
            margin: 0;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            /* Add shadow for better visibility */
        }

        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.1);
            /* Semi-transparent overlay */
            z-index: 1;
            /* Ensure overlay is below the text */
        }
    </style>
</head>

<body>
    @include('components.topbar')
    <!-- Banner Section -->
    <div class="background-banner" style="background-image: url('/images/platforms/{{ $platform->background_image }}');">
        <div class="background-overlay"></div>
        <h1 class="text-center">{{ $platform->platform_name }}</h1>
    </div>
    <div class="container my-4">

        <!-- Generations Section -->
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

        <!-- Categories Section -->
        <h2 class="mt-5">Categories</h2>
        <ul class="list-group">
            @forelse($platform->categories as $category)
                <li class="list-group-item">
                    {{ $category->category_name }}
                </li>
            @empty
                <li class="list-group-item text-muted">No categories available for this platform.</li>
            @endforelse
        </ul>
    </div>
</body>

</html>
