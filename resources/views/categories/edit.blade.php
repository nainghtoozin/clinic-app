<x-app-layout title="Edit Category">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow border-0">
                <div class="card-header bg-warning">
                    <h5 class="mb-0">Edit Category</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- IMPORTANT --}}
                        <x-category-form :category="$category" />

                    </form>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
