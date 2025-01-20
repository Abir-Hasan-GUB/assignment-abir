<section id="blog-details">
    <div class="container my-4">

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="text-muted d-flex align-items-center justify-content-between">
                    <small>Author: {{ $post->user->name }}</small>
                    <small>Published on: {{ $post->created_at->format('d-m-Y h:i A') }}</small>
                </p>
                <small>Category: {{ $post->category->name }}</small>
            </div>
            <div class="card-body">
                <p class="card-text pb-3">
                    {{ $post->description }}
                </p>
            </div>
        </div>
        @include('pages.post_details.partials.comments')
    </div>
</section>
