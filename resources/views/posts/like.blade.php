<div class="row justify-content-end">
    <form method="POST" action="/posts/{{ $post->id }}/like">
        {{ csrf_field() }}
        <input type="hidden" name="like_value" value="1">
        <button id="btn-like" type="submit"
            class="btn btn-{{ $post->showLike(auth()->id()) ? 'success' : 'secondary' }}"
            {{ $post->showLike(auth()->id()) ? '' : 'disabled' }}>
            {{ $post->likes_count }} {{ str_plural('Like', $post->likes_count) }}
        </button>
    </form>
    <form method="POST" action="/posts/{{ $post->id }}/unlike">
        {{ csrf_field() }}
        <input type="hidden" name="like_value" value="0">
        <button id="btn-unlike" type="submit"
            class="btn btn-{{ $post->showUnlike(auth()->id()) ? 'danger' : 'secondary' }}"
            {{ $post->showUnlike(auth()->id()) ? '' : 'disabled' }}>
            {{ $post->unlikes_count }} {{ str_plural('Unlike', $post->unlikes_count) }}
        </button>
    </form>
</div>