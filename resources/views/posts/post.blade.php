<div class="card mb-4">
    @if ($post->image)
    <img class="card-img-top" src="{{ $post->image }}" alt="The image did not load">
    @endif
    
    <h2 class="card-title">{{ $post->title }}</h2>
    <p class="card-text">
        {{ $post->body() }}
    </p>

    <div class="row">
        <div class="col-md-4">
            <a href="/posts/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a>
            @can ('update', $post)
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit Post</a>
            @endcan
        </div>
        <div class="col-md-4">
            @if (auth()->check() && $post->author->id != auth()->id())
            <div class="row">
                @if (Auth::check())
                    <form method="POST" action="/posts/{{ $post->id }}/like">
                        {{ csrf_field() }}
                        <input type="hidden" name="like_value" value="1">
                        <button type="submit" class="btn btn-primary"
                            {{ $post->showLike(auth()->id()) ? '' : 'disabled' }}>
                            Like ({{ $post->likes_count }})
                        </button>
                    </form>
                    <form method="POST" action="/posts/{{ $post->id }}/unlike">
                        {{ csrf_field() }}
                        <input type="hidden" name="like_value" value="0">
                        <button type="submit" class="btn btn-primary"
                            {{ $post->showUnlike(auth()->id()) ? '' : 'disabled' }}>
                            Unlike ({{ $post->unlikes_count }})
                        </button>
                    </form>
                @endif
            </div>
            @endif
        </div>
        <div class="col-md-4 text-right">
            @can ('delete', $post)
                <form method="POST" action="/posts/{{ $post->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>
            @endcan
        </div>
    </div>
    
    <div class="card-footer text-muted">
        <div class="card-text">Posted on {{ $post->created_at->format('l jS \\of F Y h:i:s A') }} by {{ $post->author->name }}</div>
        
        @if ($post->updated_at->ne($post->created_at))
        <div class="card-text">Updated on {{ $post->updated_at->format('l jS \\of F Y h:i:s A') }}</div>
        @endif
    </div>
</div>