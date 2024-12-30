<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $item->item_name }} - Details</title>
    @include('components.bootstrap')
    <style>
        body {
            margin-top: 75px;
        }
    </style>
</head>

<body>
    @include('components.topbar')

    <div class="container my-4">
        <h1>{{ $item->item_name }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/items/' . $item->image) }}" class="img-fluid" alt="{{ $item->item_name }}">
            </div>
            <div class="col-md-6">
                <p><strong>Price:</strong> ${{ $item->price }}</p>
                <p><strong>Description:</strong> {{ $item->description }}</p>
                @if ($item->manual)
                    <span class="badge bg-success">Manual Included</span>
                @else
                    <span class="badge bg-secondary">No Manual</span>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
