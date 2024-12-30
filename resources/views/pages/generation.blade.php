<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $generation->generation_name }}</title>
    @include('components.bootstrap')

</head>

<body>
    @include('components.topbar')
    <div class="container">
        <h1>{{ $generation->generation_name }}</h1>
        <p>Details about the {{ $generation->generation_name }} generation.</p>

        {{-- <h2>Related Items</h2>
            <ul>
                @forelse($relatedItems as $item)
                    <li>{{ $item->item_name }}</li>
                @empty
                    <li>No related items found for this generation.</li>
                @endforelse
            </ul> --}}
    </div>
</body>

</html>
