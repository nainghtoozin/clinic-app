<x-public-layout>
    <section class="bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <h1 class="fw-bold">
                        Your Health,<br>Our Responsibility
                    </h1>
                    <p class="lead">
                        Find trusted doctors and book appointments easily.
                    </p>

                    <a href="#doctors" class="btn btn-light btn-lg">
                        View Doctors
                    </a>
                </div>

                <div class="col-md-6 text-center">
                    <img src="{{ asset('../clinic.png') }}" class="img-fluid w-50 h-25" alt="Clinic Illustration">
                </div>

            </div>
        </div>
    </section>
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Our Services</h2>

            <div class="row text-center g-4">
                @foreach ($services as $service)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 p-4">
                            <i class="bi bi-capsule"></i>
                            <h5 class="fw-bold mt-3"> {{ $service->name }} </h5>
                            <p class="text-muted"> {{ $service->description }} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="doctors" class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Our Doctors</h2>

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
                                <a href="{{ url('/doctors/' . $doctor->id . '/book') }}" class="btn btn-primary w-100">
                                    Book Appointment
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row text-center">

                <div class="col-md-4">
                    ⏱
                    <h5 class="fw-bold mt-3">Fast Booking</h5>
                    <p class="text-muted">Book in minutes</p>
                </div>

                <div class="col-md-4">
                    🧑‍⚕️
                    <h5 class="fw-bold mt-3">Expert Doctors</h5>
                    <p class="text-muted">Certified specialists</p>
                </div>

                <div class="col-md-4">
                    🔒
                    <h5 class="fw-bold mt-3">Trusted Clinic</h5>
                    <p class="text-muted">Secure & reliable</p>
                </div>

            </div>
        </div>
    </section>
    <section id="appointment" class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h2 class="fw-bold">Need an Appointment?</h2>
            <p class="lead">Choose your doctor and book now</p>

            <a href="#doctors" class="btn btn-light btn-lg">
                Book Appointment
            </a>
        </div>
    </section>
    <section id="contact" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">Contact Us</h2>
            <p class="text-muted">
                📍 Yangon | ☎️ 09-123456789 | ✉️ clinic@email.com
            </p>
        </div>
    </section>
</x-public-layout>
