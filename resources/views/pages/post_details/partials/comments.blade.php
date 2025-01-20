<!-- Comments Section -->
<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <h5 class="card-title">Comments ({{ $post->comments->count() }})</h5>

        <!-- Comment List -->
        <ul class="list-group list-group-flush mb-4">
            @foreach ($post->comments as $comment)
                @include('pages.post_details.partials.single_comment')
            @endforeach
        </ul>

        <!-- Warning for Non-Logged-in Users -->
        @guest
            <div id="loginWarning" class="alert alert-warning" role="alert">
                <strong>Warning:</strong> You need to
                <a href="{{ route('login') }}" class="alert-link">login</a> or
                <a href="{{ route('register') }}" class="alert-link">signup</a> to post a comment.
            </div>
        @endguest

        @auth
            @include('pages.post_details.partials.write_comment')
        @endauth

    </div>
</div>
