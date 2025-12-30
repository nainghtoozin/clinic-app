<x-public-layout>
    <div class="container py-4">
        <div class="card shadow">
            @if ($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top"
                    style="height:300px; object-fit:cover;">
            @endif

            <div class="card-body">
                <h3>{{ $blog->title }}</h3>
                <p class="text-muted">
                    By {{ $blog->doctor->name ?? 'Clinic Admin' }}
                </p>
                <hr>
                {!! nl2br(e($blog->content)) !!}
            </div>
        </div>
    </div>
</x-public-layout>
