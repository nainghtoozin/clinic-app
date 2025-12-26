<x-app-layout>
    <div class="container-fluid">

        <div class="mb-4">
            <h3 class="fw-bold">Add Doctor</h3>
            <p class="text-muted">Create a new doctor account</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form method="POST" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Doctor Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Dr. John Doe"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="doctor@email.com"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Experience (Years)</label>
                            <input type="number" name="experience" class="form-control" placeholder="5">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Specialization</label>
                            <input type="text" name="specialization" class="form-control" placeholder="Cardiologist">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Service</label>
                            <select name="service_id" class="form-select" required>
                                <option value="">Select Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Doctor Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        {{-- Active Status --}}
                        {{-- <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input type="hidden" name="is_active" value="0">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                        </div> --}}

                    </div>

                    <div class="mt-4 text-end">
                        <a href="{{ route('doctors.index') }}" class="btn btn-light">
                            Cancel
                        </a>
                        <button class="btn btn-primary px-4">
                            Save Doctor
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</x-app-layout>
