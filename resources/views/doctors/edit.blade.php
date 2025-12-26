<x-app-layout>
    <div class="container-fluid">

        <div class="mb-4">
            <h3 class="fw-bold">Edit Doctor</h3>
            <p class="text-muted">Update doctor information</p>
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
                <form method="POST" action="{{ route('doctors.update', $doctor) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Doctor Name</label>
                            <input type="text" name="name" value="{{ $doctor->user->name }}" class="form-control"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $doctor->user->email }}" class="form-control"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Experience</label>
                            <input type="number" name="experience" value="{{ $doctor->experience }}"
                                class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Specialization</label>
                            <input type="text" name="specialization" value="{{ $doctor->specialization }}"
                                class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Service</label>
                            <select name="service_id" class="form-select">
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" @selected($doctor->service_id == $service->id)>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Doctor Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('storage/' . $doctor->image) }}" class="mt-2 rounded" width="120">
                        </div>

                    </div>

                    <div class="mt-4 text-end">
                        <a href="{{ route('doctors.index') }}" class="btn btn-light">
                            Cancel
                        </a>
                        <button class="btn btn-primary px-4">
                            Update Doctor
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</x-app-layout>
