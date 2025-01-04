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
    <div class="background-banner" style="background-image: url('{{ asset('images/platforms/' . $platform->background_image) }}');">
        <div class="background-overlay"></div>
        <h1 class="text-center">{{ $platform->platform_name }}</h1>
    </div>
    <div class="container my-4">

        <h2 class="mt-5">Generations</h2>
        <div class="row">
            @forelse($platform->generations as $generation)
                <div class="col-md-4 mb-3">
                    <a href="{{ route('pages.items', ['platform' => $platform->platform_name, 'generation' => $generation->generation_name]) }}"
                        style="text-decoration: none;">
                        <div
                            style="
                       width: 300px; 
                       height: 300px; 
                       background-image: url('/images/generations/{{ $generation->background_image }}'); 
                       background-size: cover; 
                       background-position: center; 
                       border-radius: 10px; 
                       position: relative; 
                       display: flex; 
                       align-items: flex-end; 
                       justify-content: center; 
                       margin: 0 auto; 
                       border: 1px solid #ddd;">
                        </div>

                    </a>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">No generations available for this platform.</p>
                </div>
            @endforelse
        </div>


        <!-- Categories Section -->
        <h2 class="mt-5">Categories</h2>
        <div class="row">
            @forelse($platform->categoryImages as $categoryImage)
                <div class="col-md-4 mb-3">
                    <a href="{{ route('pages.items', ['platform' => $platform->platform_name, 'category' => $categoryImage->category->category_name]) }}"
                        style="text-decoration: none;">
                        <div
                            style="background-image: url('/images/categories/{{ $categoryImage->image_path }}'); 
                                    width: 300px; 
                                    height: 300px; 
                                    background-size: cover; 
                                    background-position: center; 
                                    border-radius: 10px; 
                                    position: relative; 
                                    display: flex; 
                                    align-items: flex-end; 
                                    justify-content: center; 
                                    margin: 0 auto; 
                                    border: 1px solid #ddd;">
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">No categories available for this platform.</p>
                </div>
            @endforelse
        </div>

    </div>
</body>

</html>
