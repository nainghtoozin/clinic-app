<x-app-layout>
    <div class="container mt-4">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="card shadow">
                <div class="card-header">Create User</div>
                <div class="card-body row g-3">

                    <input class="form-control" name="name" placeholder="Name">
                    <input class="form-control" name="username" placeholder="Username">
                    <input class="form-control" name="email" placeholder="Email">
                    <input type="password" class="form-control" name="password" placeholder="Password">

                    <select class="form-select" name="role" id="role">
                        <option value="admin">Admin</option>
                        <option value="doctor">Doctor</option>
                        <option value="patient">Patient</option>
                    </select>

                    <div id="patient-fields" class="row g-3 d-none">
                        <input class="form-control" name="phone" placeholder="Phone">
                        <select class="form-select" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        role.onchange = () => {
            patientFields.classList.toggle('d-none', role.value !== 'patient');
        }
    </script>
</x-app-layout>
