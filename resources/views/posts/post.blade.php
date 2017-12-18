<div class="card mb-4">
    @if ($post->image)
    <img class="card-img-top" src="{{ $post->image }}" alt="The image did not load">
    @endif
    
    <h2 class="card-title">{{ $post->title }}</h2>
    <p class="card-text">
        {{ $post->body }}
    </p>

    <div class="row">
        <div class="col-md-6">
            <a href="/posts/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a>
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit Post</a>
        </div>
        <div class="col-md-6 text-right">
            <form method="POST" action="/posts/{{ $post->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">Delete Post</button>
            </form>
        </div>
    </div>
    
    <div class="card-footer text-muted">
        <div class="card-text">Posted on {{ $post->created_at->format('l jS \\of F Y h:i:s A') }} by {{ $post->author }}</div>
        
        @if ($post->updated_at->ne($post->created_at))
        <div class="card-text">Updated on {{ $post->updated_at->format('l jS \\of F Y h:i:s A') }}</div>
        @endif
    </div>
</div>