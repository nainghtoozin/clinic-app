<x-app-layout title="Add Product">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add Product</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <x-product-form :categories="$categories" />
            </form>
        </div>
    </div>
</x-app-layout>
