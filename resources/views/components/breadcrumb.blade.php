<<div class="block mt-6 mb-6">
    <nav class="flex px-5 py-3 text-gray-700 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            @foreach ($pages as $index => $page)
                <li class="inline-flex items-center">
                    @if ($index > 0)
                        <svg class="mx-1 w-3 h-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    @endif

                    @if ($page['url'] && !$loop->last)
                        <a href="{{ $page['url'] }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            @if ($loop->first)
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                            @endif
                            {{ $page['name'] }}
                        </a>
                    @else
                        <span
                            class="inline-flex items-center text-sm font-medium text-gray-500 cursor-default dark:text-gray-400">
                            {{ $page['name'] }}
                        </span>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
    </div>
