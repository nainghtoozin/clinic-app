<x-app-layout>
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-warning">
                {{ session('success') }}
            </div>
        @endif
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Services</h3>
            <a href="{{ route('services.create') }}" class="btn btn-primary">
                + Add Service
            </a>
        </div>

        <!-- Table Card -->
        <div class="card shadow-sm border-0">
            <div class="card-body">

                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $service->image) }}" class="rounded" width="60"
                                        height="60" style="object-fit:cover;">
                                </td>
                                <td class="fw-semibold">{{ $service->name }}</td>
                                <td class="text-muted">
                                    {{ Str::limit($service->description, 60) }}
                                </td>
                                <td class="fw-bold text-success">
                                    ${{ number_format($service->price, 2) }}
                                </td>
                                <td>
                                    @if ($service->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                <td class="text-end">
                                    <a href="{{ route('services.edit', $service) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>

                                    <form action="{{ route('services.destroy', $service) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this service?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No services found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</x-app-layout>
