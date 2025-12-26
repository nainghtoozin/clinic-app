<x-app-layout>
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Doctors</h3>
            <a href="{{ route('doctors.create') }}" class="btn btn-primary">
                + Add Doctor
            </a>
        </div>

        <div class="row g-4">
            @foreach ($doctors as $doctor)
                <div class="col-md-4 col-lg-3">
                    <div class="card shadow-sm border-0 h-100">

                        <img src="{{ asset('storage/' . $doctor->image) }}" class="card-img-top"
                            style="height:220px;object-fit:cover;">

                        <div class="card-body">
                            <h5 class="fw-bold mb-1">{{ $doctor->user->name }}</h5>
                            <p class="text-muted mb-1">{{ $doctor->specialization }}</p>

                            <span class="badge bg-info mb-2">
                                {{ $doctor->service->name }}
                            </span>

                            <p class="small mb-0">
                                Experience: {{ $doctor->experience }} years
                            </p>
                        </div>

                        <div class="card-footer bg-white border-0 d-flex justify-content-between">
                            <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('doctors.destroy', $doctor) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this doctor?')">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
