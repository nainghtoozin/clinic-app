<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Clinic App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #0d6efd;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, .85);
            border-radius: .375rem;
            padding: .6rem 1rem;
            margin-bottom: .25rem;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, .15);
            color: #fff;
        }

        .content {
            margin-left: 260px;
        }

        @media (max-width: 991px) {
            .sidebar {
                position: fixed;
                left: -260px;
                transition: all .3s;
            }

            .sidebar.show {
                left: 0;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body class="bg-light">

    <!-- SIDEBAR -->
    <div class="sidebar position-fixed p-3" id="sidebar">
        <h4 class="text-white fw-bold mb-4">Clinic Admin</h4>

        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    🏠 Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('services.index') }}" class="nav-link">
                    🩺 Services
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('doctors.index') }}" class="nav-link">
                    👨‍⚕️ Doctors
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('appointments.index') }}" class="nav-link">
                    📅 Appointments
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    🗂️ Categories
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link">
                    🗂️ Products
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('public.doctors') }}" class="nav-link">
                    👥 Website
                </a>
            </li>

            <li class="nav-item mt-3">
                <small class="text-white-50 ps-2">MANAGEMENT</small>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    👥 Patients
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    ⚙️ Settings
                </a>
            </li>
        </ul>
    </div>
    <!-- MAIN CONTENT -->
    <div class="content">

        <!-- TOP NAVBAR -->
        <nav class="navbar navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-outline-primary d-lg-none" id="toggleSidebar">
                    ☰
                </button>

                <span class="fw-bold">Dashboard</span>

                <div class="dropdown">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button"
                        data-bs-toggle="dropdown">
                        {{ Auth::user()->name ?? 'User' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- PAGE CONTENT -->
        <main class="container-fluid py-4">
            {{ $slot }}
        </main>

    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        document.getElementById('toggleSidebar')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
    </script>

</body>

</html>
