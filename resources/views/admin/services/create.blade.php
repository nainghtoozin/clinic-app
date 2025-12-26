<x-app-layout>
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-4">
            <h3 class="fw-bold">Add New Service</h3>
            <p class="text-muted">Create a new clinic service</p>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @include('admin.services.form')
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
