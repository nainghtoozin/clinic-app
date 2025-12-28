<x-public-layout>
    <div class="container mt-4">

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body d-flex align-items-center gap-3">
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="rounded-circle"
                    width="60" height="60">

                <div>
                    <h5 class="mb-0">Welcome back, Dr. {{ auth()->user()->name }} 👋</h5>
                    <small class="text-muted">
                        Today: {{ now()->format('l, d M Y') }}
                    </small>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">Today Appointments</h6>
                        <h3 class="fw-bold">{{ $todayCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">Pending</h6>
                        <h3 class="fw-bold text-warning">{{ $pendingCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">Completed</h6>
                        <h3 class="fw-bold text-success">{{ $completedCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>

        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 d-flex justify-content-between">
                <h6 class="mb-0 fw-semibold">My Appointments</h6>
                <a href="{{ route('appointments.index') }}" class="btn btn-sm btn-outline-primary">
                    View All
                </a>
            </div>

            <div class="card-body">

                @forelse($appointments as $appointment)
                    <div class="border rounded p-3 mb-3 d-flex justify-content-between align-items-center">

                        <div>
                            <h6 class="mb-1">{{ $appointment->patient_name }}</h6>
                            <small class="text-muted">
                                {{ $appointment->appointment_date }} · {{ $appointment->service->name ?? 'Service' }}
                            </small>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <span
                                class="badge 
                        bg-{{ $appointment->status === 'pending'
                            ? 'warning'
                            : ($appointment->status === 'approved'
                                ? 'primary'
                                : ($appointment->status === 'completed'
                                    ? 'success'
                                    : 'danger')) }}">
                                {{ ucfirst($appointment->status) }}
                            </span>

                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                View
                            </a>
                        </div>

                    </div>
                @empty
                    <p class="text-muted text-center mb-0">
                        No appointments yet.
                    </p>
                @endforelse

            </div>
        </div>

    </div>


    </div>


</x-public-layout>
