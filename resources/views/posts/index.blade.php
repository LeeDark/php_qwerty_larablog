@extends ('layouts.master')

@section ('content')
<div class="col-md-8">
    <h1 class="my-4">Page Heading
    <small>Secondary Text</small>
    </h1>

    @foreach ($posts as $post)
    @include ('posts.post')
    @endforeach

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>
</div>
@endsection
