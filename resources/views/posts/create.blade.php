@extends ('layouts.master')

@section ('content')
<div class="col-sm-8 blog-main">
	<h1 class="my-4">Add a post</h1>
	<hr>
	<form method="POST" action="/posts" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" class="form-control" id="title" name="title" required>
		</div>

		<div class="form-group">
			<label for="author">Author:</label>
			<input type="text" class="form-control" id="author" name="author" required>
		</div>

		<div class="form-group">
			<label for="body">Body:</label>
			<textarea id="body" class="form-control" name="body"></textarea>
		</div>

		<div class="form-group">
			<label for="image">Select image for post:</label>
			<input type="file" class="form-control-file" id="image" name="image" accept="image/*">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add</button>
		</div>

		<div class="form-group">
			@include ('layouts._errors')
		</div>
	</form>
</div>
@endsection