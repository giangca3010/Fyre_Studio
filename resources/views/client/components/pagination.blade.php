@if ($paginator->hasPages())
    <div class="blog-pg">
        <div class="posts">
            <div class="pagination" style="margin-top: 48px !important;">
                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())
                    <span><a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a></span>
                @endif
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="active"><a href="{{ $url }}">{{ $page }}</a></span>
                            @else
                                <span><a href="{{ $url }}">{{ $page }}</a></span>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <span><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></span>
                @endif
            </div>
        </div>
    </div>
@endif
