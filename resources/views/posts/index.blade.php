@extends ('layouts.master')

@section ('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
		    <h1 class="my-4">My Laravel Blog
		    	<small>Just for fun</small>
		    </h1>

		    @foreach ($posts as $post)
		    	@include ('posts.post')
		    @endforeach

		    @include ('posts.pagination')
		</div>

        <!-- Sidebar Widgets Column -->
        {{-- @include ('layouts._sidebar') --}}
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@endsection
