<x-app-layout>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-warning">
                        Edit Blog
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('blogs.update', $blog) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ old('title', $blog->title) }}"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Content</label>
                                <textarea name="content" rows="5" class="form-control" required>{{ old('content', $blog->content) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                @if ($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid mt-2 rounded"
                                        width="150">
                                @endif
                            </div>

                            <button class="btn btn-success w-100">
                                Update Blog
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
