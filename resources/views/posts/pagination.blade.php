@if ($posts->hasPages())
<ul class="pagination justify-content-center mb-4">
    {{-- Previous Page Link --}}
    @if ($posts->onFirstPage())
        <li class="page-item disabled"><span class="page-link">&larr; Older</span></li>
    @else
        <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}" rel="prev">&larr; Older</a></li>
    @endif

    {{-- Next Page Link --}}
    @if ($posts->hasMorePages())
        <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}" rel="next">Newer &rarr;</a></li>
    @else
        <li class="page-item disabled"><span class="page-link">Newer &rarr;</span></li>
    @endif
</ul>
@endif