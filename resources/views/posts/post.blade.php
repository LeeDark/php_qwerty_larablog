<div class="card mb-4">
    @if ($post->image)
    <img class="card-img-top" src="{{ $post->image }}" alt="The image did not load">
    @endif
    
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text">
            {{ $post->body }}
        </p>
        <a href="/posts/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    
    <div class="card-footer text-muted">
        Posted on {{ $post->created_at->format('l jS \\of F Y h:i:s A') }} by {{ $post->author }}
    </div>
</div>