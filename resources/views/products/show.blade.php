<x-public-layout>

    <section class="py-5">
        <div class="container">

            <div class="row g-5">

                {{-- Product Image --}}
                <div class="col-md-5">
                    <div class="card shadow-sm border-0">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded"
                                style="height:400px;object-fit:cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:400px;">
                                <span class="text-muted">No Image</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Product Details --}}
                <div class="col-md-7">
                    <h2 class="fw-bold mb-2">{{ $product->name }}</h2>

                    <span class="badge bg-secondary mb-3">
                        {{ $product->category->name }}
                    </span>

                    <h3 class="text-primary fw-bold mb-3">
                        ${{ number_format($product->price, 2) }}
                    </h3>

                    <p class="text-muted mb-4">
                        {{ $product->description }}
                    </p>

                    {{-- Stock --}}
                    @if ($product->stock > 0)
                        <p class="mb-3">
                            <span class="badge bg-success">In Stock</span>
                            <small class="text-muted">({{ $product->stock }} available)</small>
                        </p>
                    @else
                        <p class="mb-3">
                            <span class="badge bg-danger">Out of Stock</span>
                        </p>
                    @endif

                    {{-- Actions --}}
                    <div class="d-flex gap-3">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary btn-lg" {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                Add to Cart
                            </button>
                        </form>

                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-lg">
                            Back
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </section>

</x-public-layout>
