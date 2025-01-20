<!-- Post a Comment -->
<form action="{{ route('comments.store', $post) }}" method="POST" class="pt-4">
    @csrf
    @include('error')
    <div class="mb-3">
        <label for="commentTextarea" class="form-label fw-bold">Leave a Comment</label>
        <textarea class="form-control" id="commentTextarea" name="body" rows="3" placeholder="Write your comment here..." required></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-md">
        Post Comment
    </button>
</form>
