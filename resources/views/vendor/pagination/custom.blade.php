@if ($paginator->hasPages())
    <div class="mt-6 flex justify-center items-center">
        @if ($paginator->onFirstPage())
            <button class="px-4 py-2 mx-1 bg-gray-200 text-gray-400 rounded cursor-not-allowed">Previous</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="px-4 py-2 mx-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Previous</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-4 py-2 mx-1 bg-gray-200 text-gray-700 rounded cursor-default">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button
                            class="px-4 py-2 mx-1 bg-blue-500 text-white rounded hover:bg-blue-600">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}"
                            class="px-4 py-2 mx-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="px-4 py-2 mx-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Next</a>
        @else
            <button class="px-4 py-2 mx-1 bg-gray-200 text-gray-400 rounded cursor-not-allowed">Next</button>
        @endif
    </div>
@endif
