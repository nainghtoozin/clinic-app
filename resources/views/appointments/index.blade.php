<x-app-layout>
    {{-- resources/views/appointments/index.blade.php --}}
    <div class="container py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header">
                <h5 class="mb-0">Appointments
                    <a href="{{ route('appointments.create') }}" class="btn btn-outline-primary float-end">
                        <i class="bi bi-plus-circle"></i> New Appointment
                    </a>
                </h5>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Service</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->patient_name }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->appointment_time }}</td>

                                <td>
                                    <span class="badge bg-{{ $appointment->statusBadge() }}">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </td>

                                <td>
                                    @if ($appointment->status !== 'completed')
                                        <form method="POST" action="/appointments/{{ $appointment->id }}/status"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')

                                            <select name="status" class="form-select form-select-sm d-inline w-auto">
                                                <option value="confirmed">Confirm</option>
                                                <option value="completed">Complete</option>
                                                <option value="cancelled">Cancel</option>
                                            </select>

                                            <button class="btn btn-sm btn-primary">
                                                Update
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>

</x-app-layout>
