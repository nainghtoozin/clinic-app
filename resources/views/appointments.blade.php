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

</x-public-layout>
