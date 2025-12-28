<div class="mb-3">
    <label class="form-label fw-semibold">Category Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') ?? ($category->name ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Slug</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug') ?? ($category->slug ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Description</label>
    <textarea name="description" class="form-control" rows="4">
{{ old('description') ?? ($category->description ?? '') }}
</textarea>
</div>



<div class="mb-3">
    <label class="form-label fw-semibold">Category Image</label>
    <input type="file" name="image" class="form-control">
</div>

<div class="form-check form-switch mb-4">
    <input class="form-check-input" type="checkbox" name="is_active"
        {{ old('is_active') ?? ($category->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label fw-semibold">Active</label>
</div>

<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('categories.index') }}" class="btn btn-light">
        Cancel
    </a>
    <button class="btn btn-success">
        Save Category
    </button>
</div>
