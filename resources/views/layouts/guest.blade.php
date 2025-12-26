<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Clinic App') }}</title> <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js']) <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont;
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
        }

        .text-soft {
            color: #6c757d;
        }

        .card-hover {
            transition: all .3s ease;
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, .08);
        }

        .btn-rounded {
            border-radius: 50px;
            padding: 10px 22px;
        }

        .icon-circle {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            background: #e7f1ff;
            color: #0d6efd;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            <div class="col-md-6 col-lg-5"> <!-- Card -->
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-4 p-md-5"> <!-- Logo -->
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-primary"> {{ config('app.name', 'Clinic App') }} </h3>
                            <p class="text-muted small"> Sign in to continue </p>
                        </div> {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
