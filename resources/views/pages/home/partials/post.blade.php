<div class="col">
    <div class="card text-center">
        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="nav-link">
            <div class="card-header">
                <h5 class="card-title">
                    {{$post->title}}
                </h5>
                <h6 class="text-start">
                    <small>Category: {{$post->category->name}}</small>
                </h6>
            </div>
            <div class="card-body">
                <p class="card-text">
                    {{ \Illuminate\Support\Str::limit($post->description, 150) }}
                </p>
            </div>
        </a>
        <div class="card-footer text-body-secondary d-flex align-items-center justify-content-between">
            <p>{{$post->created_at->format('d-m-Y h:i A')}}</p>
            <p>
                <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="text-primary fw-bold"> {{$post->comments->count()}} Comments</a>
            </p>
            <p>{{$post->user->name}}</p>
        </div>
    </div>
</div>
