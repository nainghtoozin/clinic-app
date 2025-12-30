<x-app-layout>
    <div class="container py-4">
        <div class="d-flex justify-content-between mb-3">
            <h3>Clinic Blogs</h3>
            <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                + New Blog
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if ($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5>{{ $blog->title }}</h5>
                            <p class="text-muted small">
                                {{ Str::limit(strip_tags($blog->content), 80) }}
                            </p>

                            <a href="{{ route('blogs.show', $blog) }}" class="btn btn-sm btn-outline-primary">
                                View
                            </a>
                            <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-outline-warning">
                                Edit
                            </a>

                            <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Delete this blog?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $blogs->links() }}
    </div>
</x-app-layout>
