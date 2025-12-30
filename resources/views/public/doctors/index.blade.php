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

    {{-- doctors list --}}
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

    {{-- products list --}}
    <section id="products" class="py-5 bg-light">
        <div class="container">

            <h2 class="text-center fw-bold mb-4">Our Products</h2>

            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">

                            {{-- Product Image --}}
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                    style="height:200px; object-fit:cover;">
                            @else
                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                    style="height:200px;">
                                    No Image
                                </div>
                            @endif

                            {{-- Product Info --}}
                            <div class="card-body text-center">
                                <h6 class="fw-bold mb-1">
                                    {{ $product->name }}
                                </h6>

                                <p class="text-muted small mb-2">
                                    {{ Str::limit($product->description, 60) }}
                                </p>

                                <h5 class="text-primary fw-bold mb-3">
                                    ${{ number_format($product->price, 2) }}
                                </h5>
                            </div>

                            {{-- Actions --}}
                            <div class="card-footer bg-white border-0">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('products.show', $product) }}"
                                        class="btn btn-outline-primary btn-sm">
                                        View Details
                                    </a>


                                    <button onclick="addToCart({{ $product->id }})" class="btn btn-sm btn-primary">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <section id="blogs" class="py-5 bg-white">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if ($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top"
                                style="height:150px; object-fit:cover;">
                        @endif
                        <div class="card-body">
                            <h5>{{ $blog->title }}</h5>
                            <p class="text-muted small">
                                {{ Str::limit(strip_tags($blog->content), 80) }}
                            </p>

                            <p class="text-muted">
                                By {{ $blog->doctor->user->name ?? 'Clinic Admin' }}
                            </p>

                            <a href="{{ route('blogs.show', $blog) }}" class="btn btn-sm btn-outline-primary">
                                View
                            </a>
                            <a href="#" class="btn btn-sm btn-primary">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                            @auth
                                @php
                                    $patient = auth()->user()->patient;
                                    $isFollowing = $patient ? $patient->followedDoctors->contains($doctor->id) : false;
                                @endphp

                                <form action="{{ route('doctors.follow', $doctor) }}" method="POST">
                                    @csrf
                                    <button
                                        class="btn btn-sm {{ $isFollowing ? 'btn-outline-danger' : 'btn-outline-success' }}">
                                        {{ $isFollowing ? 'Unfollow' : 'Follow' }}
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">
                                    Login to Follow
                                </a>
                            @endauth

                        </div>
                    </div>
                </div>
            @endforeach
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


    <script>
        function addToCart(productId) {
            axios.post(`/cart/add/${productId}`)
                .then(() => {
                    alert('Added to cart');
                });
        }
    </script>
</x-public-layout>
