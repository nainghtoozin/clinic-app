<div class="mb-3">
    <label class="form-label fw-semibold">Product Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') ?? ($product->name ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Slug</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug') ?? ($product->slug ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Category</label>
    <select name="category_id" class="form-select">
        @foreach ($categories as $id => $name)
            <option value="{{ $id }}"
                {{ (old('category_id') ?? ($product->category_id ?? '')) == $id ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Price</label>
        <input type="number" step="0.01" name="price" class="form-control"
            value="{{ old('price') ?? ($product->price ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock') ?? ($product->stock ?? 0) }}">
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Image</label>
    <input type="file" name="image" class="form-control">
</div>

<div class="form-check form-switch mb-4">
    <input class="form-check-input" type="checkbox" name="is_active"
        {{ old('is_active') ?? ($product->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label fw-semibold">Active</label>
</div>

<div class="text-end">
    <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
    <button class="btn btn-success">Save Product</button>
</div>
