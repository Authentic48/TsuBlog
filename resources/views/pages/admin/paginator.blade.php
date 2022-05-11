<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
        
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"></a>
                <li><span aria-hidden="true" class="page-link">&laquo;</span></li>
            </li>
        @endif
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li class="page-item"><span>{{ $element }}</span></li>
            @endif
            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
