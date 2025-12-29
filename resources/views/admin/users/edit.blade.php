<x-app-layout>
    <div class="container mt-4">

        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Edit User</h5>
                </div>

                <div class="card-body row g-3">

                    {{-- Name --}}
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>

                    {{-- Username --}}
                    <div class="col-md-6">
                        <label class="form-label">Username</label>
                        <input class="form-control" name="username" value="{{ old('username', $user->username) }}"
                            disabled>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>

                    {{-- Role --}}
                    <div class="col-md-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" id="role">
                            <option value="admin" @selected($user->role == 'admin')>Admin</option>
                            <option value="patient" @selected($user->role == 'patient')>Patient</option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="active" @selected($user->status == 'active')>Active</option>
                            <option value="inactive" @selected($user->status == 'inactive')>Inactive</option>
                        </select>
                    </div>

                    {{-- ================= Patient Fields ================= --}}
                    <div id="patient-fields" class="row g-3 mt-2 {{ $user->role !== 'patient' ? 'd-none' : '' }}">

                        <hr>

                        <h6 class="text-primary">Patient Information</h6>

                        {{-- Phone --}}
                        <div class="col-md-4">
                            <label class="form-label">Phone</label>
                            <input class="form-control" name="phone"
                                value="{{ old('phone', $user->patient->phone ?? '') }}">
                        </div>

                        {{-- Gender --}}
                        <div class="col-md-4">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option value="">-- Select --</option>
                                <option value="male" @selected(($user->patient->gender ?? '') == 'male')>Male</option>
                                <option value="female" @selected(($user->patient->gender ?? '') == 'female')>Female</option>
                                <option value="other" @selected(($user->patient->gender ?? '') == 'other')>Other</option>
                            </select>
                        </div>

                        {{-- DOB --}}
                        <div class="col-md-4">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="dob"
                                value="{{ old('dob', $user->patient->dob ?? '') }}">
                        </div>

                        {{-- Address --}}
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <input class="form-control" name="address"
                                value="{{ old('address', $user->patient->address ?? '') }}">
                        </div>
                    </div>
                    {{-- =================================================== --}}

                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                    <button class="btn btn-success">Update</button>
                </div>
            </div>

        </form>
    </div>

    {{-- Dynamic Role Toggle --}}
    <script>
        const role = document.getElementById('role');
        const patientFields = document.getElementById('patient-fields');

        role.addEventListener('change', function() {
            patientFields.classList.toggle('d-none', this.value !== 'patient');
        });
    </script>

</x-app-layout>
