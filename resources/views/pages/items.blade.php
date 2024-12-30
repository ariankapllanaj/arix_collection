<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Items Page</title>
    @include('components.bootstrap')
    <style>
        body {
            margin-top: 75px;
        }
        .filter-container {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    @include('components.topbar')

    <div class="container my-4">
        <div class="row">
            <!-- Left Side: Filters and Sorting -->
            <div class="col-md-3">
                <div class="filter-container">
                    <h5>Filters</h5>
                    <form method="GET" action="{{ route('pages.items') }}">
                        <!-- Platform Filter -->
                        <h6>Platform</h6>
                        <div class="mb-3">
                            @foreach ($platforms as $platform)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="platform_{{ $platform->id }}" 
                                        name="platform[]" value="{{ $platform->platform_name }}" 
                                        {{ in_array($platform->platform_name, (array) request('platform')) ? 'checked' : '' }} 
                                        onchange="this.form.submit()">
                                    <label class="form-check-label" for="platform_{{ $platform->id }}">
                                        {{ $platform->platform_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Generation Filter -->
                        <h6>Generation</h6>
                        <div class="mb-3">
                            @foreach ($generations as $generation)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="generation_{{ $generation->id }}" 
                                        name="generation[]" value="{{ $generation->generation_name }}" 
                                        {{ in_array($generation->generation_name, (array) request('generation')) ? 'checked' : '' }} 
                                        onchange="this.form.submit()">
                                    <label class="form-check-label" for="generation_{{ $generation->id }}">
                                        {{ $generation->generation_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Manual Filter -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="manual" name="manual" value="1" 
                                {{ request('manual') == '1' ? 'checked' : '' }} onchange="this.form.submit()">
                            <label class="form-check-label" for="manual">
                                Only Items with Manual
                            </label>
                        </div>

                        <!-- Sorting Options -->
                        <h5>Sorting</h5>
                        <div class="mb-3">
                            <select name="sort" class="form-select" onchange="this.form.submit()">
                                <option value="">Sort By</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="added_desc" {{ request('sort') == 'added_desc' ? 'selected' : '' }}>Newest to Oldest</option>
                                <option value="added_asc" {{ request('sort') == 'added_asc' ? 'selected' : '' }}>Oldest to Newest</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Middle Section: Items -->
            <div class="col-md-9">
                <div class="row">
                    @forelse ($items as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->item_name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->item_name }}</h5>
                                    <p class="card-text"><strong>Price:</strong> ${{ $item->price }}</p>
                                    @if ($item->manual)
                                        <span class="badge bg-success">Manual Included</span>
                                    @else
                                        <span class="badge bg-secondary">No Manual</span>
                                    @endif
                                    <a href="{{ route('pages.item', ['id' => $item->id]) }}" class="btn btn-primary mt-2">More Information</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-muted">No items found matching your filters.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
