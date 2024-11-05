<div id="pagination">
    @if ($paginator->onFirstPage())
    <span>&lt;</span>
    @else
    <span><a href="{{ $paginator->previousPageUrl() }}">&lt;</a></span>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
    <span>{{ $element }}</span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
    <span class="active">{{ $page }}</span>
                @else
    <span><a href="{{ $url }}">{{ $page }}</a></span>
                @endif
        @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
    <span>
    <a href="{{ $paginator->nextPageUrl() }}">&gt;</a>
    </span>
    @else
    <span>&gt;</span>
    @endif
</div>