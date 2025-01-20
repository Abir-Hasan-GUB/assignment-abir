<li class="list-group-item">
    <p class="fw-bold mb-1">{{ $comment->user->name }}</p>
    <p class="mb-1">
        {{ $comment->body }}
    </p>
    <small class="text-muted">Posted on: {{ $comment->created_at->format('d-m-Y h:i A') }}</small>

    @can('delete', $comment)
        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2" onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
        </form>
    @endcan
</li>
