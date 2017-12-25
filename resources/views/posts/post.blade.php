<div class="card mb-4">
    @if ($post->image)
    <img class="card-img-top" src="{{ $post->image }}" alt="The image did not load">
    @endif
    
    <h2 class="card-title">{{ $post->title }}</h2>
    <p class="card-text">
        {{ $post->prepareBody() }}
    </p>

    <div class="row justify-content-between">
        @include ('posts.buttons')
    </div>
    
    <div class="card-footer text-muted">
        <div class="card-text">Posted on {{ $post->created_at->format('l jS \\of F Y h:i:s A') }} by {{ $post->author->name }}</div>
        
        @if ($post->updated_at->ne($post->created_at))
        <div class="card-text">Updated on {{ $post->updated_at->format('l jS \\of F Y h:i:s A') }}</div>
        @endif
    </div>
</div>