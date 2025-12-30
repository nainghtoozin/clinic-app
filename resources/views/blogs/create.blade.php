<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">📝 Create New Blog</h5>
                    </div>

                    <div class="card-body">

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Title --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Blog Title
                                </label>
                                <input type="text" name="title" class="form-control" placeholder="Enter blog title"
                                    value="{{ old('title') }}" required>
                            </div>

                            {{-- Content --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Blog Content
                                </label>
                                <textarea name="content" rows="6" class="form-control" placeholder="Write blog content here..." required>{{ old('content') }}</textarea>
                            </div>

                            {{-- Image --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Blog Image (optional)
                                </label>
                                <input type="file" name="image" class="form-control">
                                <small class="text-muted">
                                    JPG, PNG only (Max 2MB)
                                </small>
                            </div>

                            {{-- Actions --}}
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary">
                                    ← Back
                                </a>

                                <button type="submit" class="btn btn-success px-4">
                                    Publish Blog
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
