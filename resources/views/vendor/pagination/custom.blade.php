@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between" style="display: flex; flex-direction: row; width: min-content; white-space: nowrap; margin-left: auto; margin-right: 0;">
        <div>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span style="padding: 10px 18px; border: 1px solid black; border-radius: 100%; margin-right: 10px; background-color: #e9cc66" class="pagination-disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="pagination-arrow">&lsaquo;</span>
                </span>
            @else
                <a style="padding: 10px 18px; border: 1px solid black; border-radius: 100%; margin-right: 10px;" href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-link" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            @endif
        </div>

        <div>
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span style="padding: 5px; border: 1px solid black; border-radius: 10%;" class="pagination-dots">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span style="padding: 5px; border: 1px solid black; border-radius: 10%;  background-color: #e9cc66" class="pagination-current">{{ $page }}</span>
                        @else
                            <a style="padding: 5px; border: 1px solid black; border-radius: 10%;" href="{{ $url }}" class="pagination-link">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        <div>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a style="padding: 10px 18px; border: 1px solid black; border-radius: 100%; margin-left: 10px;" href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-link" aria-label="@lang('pagination.next')">&rsaquo;</a>
            @else
                <span style="padding: 10px 18px; border: 1px solid black; border-radius: 100%; margin-left: 10px; background-color: #e9cc66" class="pagination-disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="pagination-arrow">&rsaquo;</span>
                </span>
            @endif
        </div>
    </nav>
@endif
