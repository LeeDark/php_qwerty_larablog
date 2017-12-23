@if ($posts->hasPages())
<ul class="pagination justify-content-center mb-4">
    {{-- Previous Page Link --}}
    @if ($posts->onFirstPage())
        <li class="page-item disabled"><span class="page-link">&larr; Newer</span></li>
    @else
        <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}" rel="prev">&larr; Newer</a></li>
    @endif

    {{-- Next Page Link --}}
    @if ($posts->hasMorePages())
        <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}" rel="next">Older &rarr;</a></li>
    @else
        <li class="page-item disabled"><span class="page-link">Older &rarr;</span></li>
    @endif
</ul>
@endif