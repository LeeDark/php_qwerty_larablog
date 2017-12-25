@extends ('layouts.master')
@section ('content')
<div class="container">
    <div class="row">
		<div class="col-sm-8 blog-main">
			<div class="card mb-4">
				<div class="card-header text-muted">
					<div class="card-text">Posted on {{ $post->created_at->format('l jS \\of F Y h:i:s A') }} by {{ $post->author->name }}</div>
					
					@if ($post->updated_at->ne($post->created_at))
						<div class="card-text">Updated on {{ $post->updated_at->format('l jS \\of F Y h:i:s A') }}</div>
					@endif
				</div>

				@if ($post->image)
					<img class="card-img-top" src="{{ $post->image }}" alt="The image did not load">
				@endif

				<div class="card-body">
					<h2 class="card-title">{{ $post->title }}</h2>
					<p class="card-text">{{ $post->prepareBody() }}</p>

					<div class="row justify-content-between">
						@include ('posts.buttons')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection