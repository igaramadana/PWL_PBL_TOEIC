<div class="gap-2 justify-between items-center sm:flex" wire:loading.class="blur-[2px]" wire:target="loadMore">
    <div class="justify-between items-center w-full sm:flex-1 sm:flex">
        @if ($recordCount === 'full')
            <div @class(['mr-3' => $paginator->hasPages()])>
                <div @class([
                    'mr-2' => $paginator->hasPages(),
                    'leading-5 text-center text-gray-700 text-md dark:text-gray-300 sm:text-right',
                ])>
                    {{ trans('livewire-powergrid::datatable.pagination.showing') }}
                    <span
                        class="font-semibold text-gray-900 dark:text-white firstItem">{{ $paginator->firstItem() }}</span>
                    {{ trans('livewire-powergrid::datatable.pagination.to') }}
                    <span
                        class="font-semibold text-gray-900 dark:text-white lastItem">{{ $paginator->lastItem() }}</span>
                    {{ trans('livewire-powergrid::datatable.pagination.of') }}
                    <span class="font-semibold text-gray-900 dark:text-white total">{{ $paginator->total() }}</span>
                    {{ trans('livewire-powergrid::datatable.pagination.results') }}
                </div>
            </div>
        @elseif($recordCount === 'short')
            <div @class(['mr-3' => $paginator->hasPages()])>
                <p @class([
                    'mr-2' => $paginator->hasPages(),
                    'leading-5 text-center text-gray-700 text-md dark:text-gray-300 sm:text-right',
                ])>
                    <span class="font-semibold text-gray-900 dark:text-white firstItem">
                        {{ $paginator->firstItem() }}</span>
                    -
                    <span class="font-semibold text-gray-900 dark:text-white lastItem">
                        {{ $paginator->lastItem() }}</span>
                    |
                    <span class="font-semibold text-gray-900 dark:text-white total"> {{ $paginator->total() }}</span>
                </p>
            </div>
        @elseif($recordCount === 'min')
            <div @class(['mr-3' => $paginator->hasPages()])>
                <p @class([
                    'mr-2' => $paginator->hasPages(),
                    'leading-5 text-center text-gray-700 text-md dark:text-gray-300 sm:text-right',
                ])>
                    <span class="font-semibold text-gray-900 dark:text-white firstItem">
                        {{ $paginator->firstItem() }}</span>
                    -
                    <span class="font-semibold text-gray-900 dark:text-white lastItem">
                        {{ $paginator->lastItem() }}</span>
                </p>
            </div>
        @endif

        @if ($paginator->hasPages() && !in_array($recordCount, ['min', 'short']))
            <nav role="navigation" aria-label="Pagination Navigation" class="justify-between items-center sm:flex">
                <div class="flex justify-center mt-2 md:flex-none md:justify-end sm:mt-0">

                    @if (!$paginator->onFirstPage())
                        <a class="inline-flex relative items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 bg-white rounded-l-lg border border-gray-300 transition duration-150 ease-in-out cursor-pointer dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-blue-100 active:text-blue-700"
                            wire:click="gotoPage(1, '{{ $paginator->getPageName() }}')">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                            </svg>
                        </a>

                        <a class="inline-flex relative items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 transition duration-150 ease-in-out cursor-pointer dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-blue-100 active:text-blue-700"
                            wire:click="previousPage('{{ $paginator->getPageName() }}')" rel="next">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span
                                        class="inline-flex relative z-10 items-center px-3 py-2 -ml-px text-sm font-bold text-blue-600 bg-blue-50 border border-blue-300 cursor-default select-none dark:text-white dark:bg-blue-600 dark:border-blue-700">{{ $page }}</span>
                                @elseif (
                                    $page === $paginator->currentPage() + 1 ||
                                        $page === $paginator->currentPage() + 2 ||
                                        $page === $paginator->currentPage() - 1 ||
                                        $page === $paginator->currentPage() - 2)
                                    <a class="inline-flex relative items-center px-3 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 transition duration-150 ease-in-out cursor-pointer select-none dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-blue-100 active:text-blue-700"
                                        wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <a @class([
                            'block' => $paginator->lastPage() - $paginator->currentPage() >= 2,
                            'hidden' => $paginator->lastPage() - $paginator->currentPage() < 2,
                            'select-none cursor-pointer relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 leading-5 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-blue-100 active:text-blue-700 transition ease-in-out duration-150',
                        ]) wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            rel="next">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                        <a class="inline-flex relative items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 bg-white rounded-r-lg border border-gray-300 transition duration-150 ease-in-out cursor-pointer select-none dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-blue-100 active:text-blue-700"
                            wire:click="gotoPage({{ $paginator->lastPage() }}, '{{ $paginator->getPageName() }}')">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    @endif
                </div>
            </nav>
        @endif

        <div>
            @if ($paginator->hasPages() && in_array($recordCount, ['min', 'short']))
                <nav role="navigation" aria-label="Pagination Navigation" class="justify-between items-center sm:flex">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            @if (!$paginator->onFirstPage())
                                <button wire:click="gotoPage(1, '{{ $paginator->getPageName() }}')"
                                    class="flex justify-center items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            @endif
                            @foreach ($elements as $element)
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                            <span
                                                class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg border border-blue-600 dark:bg-blue-600 dark:border-blue-600">{{ $page }}</span>
                                        @elseif (
                                            $page === $paginator->currentPage() + 1 ||
                                                $page === $paginator->currentPage() + 2 ||
                                                $page === $paginator->currentPage() - 1 ||
                                                $page === $paginator->currentPage() - 2)
                                            <button
                                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                                class="px-3 py-2 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">{{ $page }}</button>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            @if ($paginator->hasMorePages())
                                <button
                                    wire:click="gotoPage({{ $paginator->lastPage() }}, '{{ $paginator->getPageName() }}')"
                                    class="flex justify-center items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>
                </nav>
            @endif
        </div>
    </div>
</div>
