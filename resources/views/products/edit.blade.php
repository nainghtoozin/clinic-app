<x-app-layout title="Edit Product">
    <div class="card shadow border-0">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Product</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <x-product-form :product="$product" :categories="$categories" />
            </form>
        </div>
    </div>
</x-app-layout>
