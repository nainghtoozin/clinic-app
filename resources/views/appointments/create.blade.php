<x-public-layout>

    <section class=" bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <!-- Page Title -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Book Appointment</h2>
                        <p class="text-muted">
                            Please fill in the form below to confirm your appointment
                        </p>
                    </div>

                    <div class="card shadow border-0 rounded-4 overflow-hidden">
                        <div class="row g-0">

                            <!-- LEFT : Doctor Info -->
                            <div class="col-md-5 bg-primary text-white p-4">
                                <h5 class="fw-bold mb-4">Doctor Information</h5>

                                <div class="mb-3">
                                    <small class="opacity-75">Doctor</small>
                                    <h6 class="fw-bold mb-0">
                                        {{ $doctor->user->name }}
                                    </h6>
                                </div>

                                <div class="mb-3">
                                    <small class="opacity-75">Specialization</small>
                                    <h6 class="fw-bold mb-0">
                                        {{ $doctor->specialization }}
                                    </h6>
                                </div>

                                <div class="mb-3">
                                    <small class="opacity-75">Service</small>
                                    <h6 class="fw-bold mb-0">
                                        {{ $doctor->service->name }}
                                    </h6>
                                </div>

                                <div class="mt-4 p-3 bg-white bg-opacity-25 rounded">
                                    <small class="opacity-75">Consultation Fee</small>
                                    <h4 class="fw-bold mb-0">
                                        {{ number_format($doctor->service->price) }} MMK
                                    </h4>
                                </div>
                            </div>

                            <!-- RIGHT : Appointment Form -->
                            <div class="col-md-7 p-4 p-md-5 bg-white">

                                <form method="POST" action="{{ url('/appointments/' . $doctor->id) }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label fw-medium">
                                            Patient Name
                                        </label>
                                        <input type="text" name="patient_name" class="form-control form-control-lg"
                                            placeholder="Enter your full name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-medium">
                                            Email Address
                                        </label>
                                        <input type="email" name="patient_email" class="form-control"
                                            placeholder="your@email.com" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-medium">
                                            Phone Number
                                        </label>
                                        <input type="text" name="patient_phone" class="form-control"
                                            placeholder="09xxxxxxxx">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-medium">
                                                Appointment Date
                                            </label>
                                            <input type="date" name="appointment_date" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-medium">
                                                Appointment Time
                                            </label>
                                            <input type="time" name="appointment_time" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-medium">
                                            Additional Notes
                                        </label>
                                        <textarea name="note" class="form-control" rows="3"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill mt-3">
                                        Confirm Appointment
                                    </button>

                                    <p class="text-muted small text-center mt-3 mb-0">
                                        We will contact you to confirm your booking.
                                    </p>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    </x-guest-layout>
