<x-app-layout title="Categories">

    <div class="card shadow-sm border-0">

        {{-- Card Header --}}
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Category List</h5>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
                + Add Category
            </a>
        </div>

        {{-- Card Body --}}
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" class="rounded"
                                            width="50" height="50" style="object-fit:cover;">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>

                                <td class="fw-semibold">
                                    {{ $category->name }}
                                </td>

                                <td>
                                    <span class="text-muted">{{ $category->slug }}</span>
                                </td>

                                <td>
                                    <span class="badge {{ $category->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $category->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>

                                <td class="text-end">
                                    <a href="{{ route('categories.edit', $category) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    No categories found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        {{-- Card Footer --}}
        <div class="card-footer bg-white">
            {{ $categories->links() }}
        </div>

    </div>

</x-app-layout>
