@csrf

<div class="row g-4">

    <!-- Service Name -->
    <div class="col-md-6">
        <label class="form-label fw-semibold">Service Name</label>
        <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}" class="form-control"
            placeholder="e.g. General Checkup" required>
    </div>

    <!-- Price -->
    <div class="col-md-6">
        <label class="form-label fw-semibold">Price</label>
        <input type="number" name="price" step="0.01" value="{{ old('price', $service->price ?? '') }}"
            class="form-control" placeholder="e.g. 50.00" required>
    </div>

    <!-- Description -->
    <div class="col-12">
        <label class="form-label fw-semibold">Description</label>
        <textarea name="description" rows="4" class="form-control" placeholder="Describe the service..." required>{{ old('description', $service->description ?? '') }}</textarea>
    </div>

    <!-- Image -->
    <div class="col-12">
        <label class="form-label fw-semibold">Service Image</label>
        <input type="file" name="image" class="form-control">

        @isset($service->image)
            <div class="mt-3">
                <img src="{{ asset('storage/' . $service->image) }}" class="rounded shadow-sm" width="120">
            </div>
        @endisset
    </div>

    {{-- Active Status --}}
    <div class="col-12">
        <div class="form-check form-switch mt-2">
            <input type="hidden" name="is_active" value="0">
            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>
    </div>
</div>

<!-- Buttons -->
<div class="mt-4 d-flex justify-content-end gap-2">
    <a href="{{ route('services.index') }}" class="btn btn-light">
        Cancel
    </a>
    <button class="btn btn-primary px-4">
        Save Service
    </button>
</div>
