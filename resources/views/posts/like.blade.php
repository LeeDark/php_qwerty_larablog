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