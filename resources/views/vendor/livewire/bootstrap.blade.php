<div>
    @if ($paginator->hasPages())
        <nav>
            <ul class="pagination flex flex-row">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled mx-2 text-gray-500" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link px-2" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item mx-2">
                        <button type="button" dusk="previousPage" class="page-link px-2" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</button>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled mx-2 px-2" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active mx-2" wire:key="paginator-page-{{ $page }}" aria-current="page"><span class="page-link px-2">{{ $page }}</span></li>
                            @else
                                <li class="page-item mx-2 text-gray-500" wire:key="paginator-page-{{ $page }}"><button type="button" class="page-link px-2" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item mx-2">
                        <button type="button" dusk="nextPage" class="page-link px-2" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</button>
                    </li>
                @else
                    <li class="page-item disabled mx-2 text-gray-500" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link px-2" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
