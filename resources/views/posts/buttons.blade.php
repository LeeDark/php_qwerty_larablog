<div class="col-4">
    <a href="/posts/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a>
    @can ('update', $post)
    <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit Post</a>
    @endcan
</div>
<div class="col-4 div-like">
    <div class="row justify-content-end">
        <button type="submit"
            value="{{ $post->id }}"
            class="btn btn-{{ $post->showLike(auth()->id()) ? 'success' : 'secondary' }} btn-like"
            @if (auth()->check())
                @if ($post->author->id != auth()->id())
                    {{ $post->showLike(auth()->id()) ? '' : 'disabled' }}
                @else
                disabled
                @endif
            @else
            disabled 
            @endif
            >
            {{ $post->likes_count }} {{ str_plural('Like', $post->likes_count) }}
        </button>

        <button type="submit"
            value="{{ $post->id }}"
            class="btn btn-{{ $post->showUnlike(auth()->id()) ? 'danger' : 'secondary' }} btn-unlike"
            @if (auth()->check())
                @if ($post->author->id != auth()->id())
                    {{ $post->showUnlike(auth()->id()) ? '' : 'disabled' }}
                @else
                disabled
                @endif
            @else
            disabled 
            @endif
            >
            {{ $post->unlikes_count }} {{ str_plural('Unlike', $post->unlikes_count) }}
        </button>
    </div>
</div>
<div class="col-4 text-right">
    @can ('delete', $post)
        <form method="POST" action="/posts/{{ $post->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">Delete Post</button>
        </form>
    @endcan
</div>