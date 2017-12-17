@extends ('layouts.master')

@section ('content')
<div class="col-md-8">
    <h1 class="my-4">Page Heading
    <small>Secondary Text</small>
    </h1>

    @foreach ($posts as $post)
    @include ('posts.post')
    @endforeach

    @include ('posts.pagination')
</div>
@endsection
