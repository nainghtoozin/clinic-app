<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Clinic App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-vh-100 d-flex align-items-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="row g-0">

                        <!-- LEFT CONTENT -->
                        <div class="col-md-7 p-5">
                            <h1 class="fw-bold mb-3">
                                Welcome to <span class="text-primary">Clinic App</span>
                            </h1>

                            <p class="text-muted mb-4">
                                A modern clinic management system built with Laravel & Bootstrap.
                            </p>

                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item px-0">
                                    ✅ Manage Patients
                                </li>
                                <li class="list-group-item px-0">
                                    ✅ Schedule Appointments
                                </li>
                                <li class="list-group-item px-0">
                                    ✅ Doctor & Staff Management
                                </li>
                            </ul>

                            <div class="d-flex gap-2">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-primary px-4">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary px-4">
                                        Login
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-outline-primary px-4">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>

                        <!-- RIGHT IMAGE -->
                        <div
                            class="col-md-5 d-none d-md-flex align-items-center justify-content-center bg-primary text-white rounded-end-4">
                            <div class="text-center p-4">
                                <h3 class="fw-bold mb-2">Clinic App</h3>
                                <p class="opacity-75">
                                    Simple • Secure • Fast
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
