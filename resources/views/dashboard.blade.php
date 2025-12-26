<x-app-layout>
    <div class="container-fluid py-4">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Dashboard</h3>
            <span class="badge bg-success">Online</span>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width:50px;height:50px;">
                                👨‍⚕️
                            </div>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Doctors</h6>
                            <h4 class="fw-bold mb-0">12</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width:50px;height:50px;">
                                🧑‍🤝‍🧑
                            </div>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Patients</h6>
                            <h4 class="fw-bold mb-0">320</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width:50px;height:50px;">
                                📅
                            </div>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Appointments</h6>
                            <h4 class="fw-bold mb-0">45</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Welcome Card -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">Welcome back 👋</h5>
                        <p class="text-muted mb-0">
                            You're successfully logged in. Use the dashboard to manage doctors, patients,
                            and appointments efficiently.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
