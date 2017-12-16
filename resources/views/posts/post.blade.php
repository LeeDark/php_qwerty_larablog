<div class="card mb-4">
    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text">{{ $post->body }}</p>
        <a href="/posts/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
        Posted on {{ $post->created_at->format('l jS \\of F Y h:i:s A') }} by
        <a href="#">{{ $post->author }}</a>
    </div>
</div>