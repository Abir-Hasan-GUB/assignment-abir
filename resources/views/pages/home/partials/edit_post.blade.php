<section id="post-box" class="pt-4">
    <div class="container">
        @if (Route::currentRouteName() !== 'dashboard')
            @include('error')
        @endif

        <form action="{{ route('posts.update', $post) }}" method="POST" class="p-3 shadow border rounded">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-7">
                    <div class="mb-3">
                        <label for="postTitle" class="form-label fw-medium">Post Title</label>
                        <input type="text" class="form-control" id="postTitle" name="title"
                            value="{{ $post->title }}" placeholder="Enter title" required />
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                        {{-- category dropdown --}}
                        <label for="category_id" class="form-label fw-medium">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="postTextarea" class="form-label fw-medium">Post Details</label>
                <textarea class="form-control" id="postTextarea" rows="4" name="description"
                    placeholder="Write your description here..." required>{{ $post->description }}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-md w-50">
                    Update
                </button>
            </div>
        </form>
    </div>
</section>
