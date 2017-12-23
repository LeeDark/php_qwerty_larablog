@extends ('layouts.master')

@section ('content')
<div class="col-sm-8 blog-main">
	<h1 class="my-4">Edit post</h1>
	<hr>
	<form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
		<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
		</div>

		<div class="form-group">
			<label for="author">Author:</label>
			<input type="text" class="form-control" id="author" name="author" value="{{ $post->author }}" required>
		</div>

		<div class="form-group">
			<label for="body">Body:</label>
			<textarea id="body" class="form-control" name="body" required>{{ $post->body }}</textarea>
		</div>

		<div class="form-group">
			<label for="image">Select new image for post:</label>
			<input type="file" class="form-control-file" id="image" name="image" accept="image/*">
		</div>

		<div class="row">
			<div class="col-md-6">
				<button type="submit" class="btn btn-primary">Apply</button>
			</div>
			<div class="col-md-6 text-right">
				<a href="/posts/{{ $post->id }}" class="btn btn-warning">Cancel</a>
			</div>
		</div>

		<div class="form-group">
			@include ('layouts._errors')
		</div>
	</form>
</div>
@endsection