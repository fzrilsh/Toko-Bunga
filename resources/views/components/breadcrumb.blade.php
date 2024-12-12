<nav class="bg-gray-200 py-3 px-4">
    <div class="container mx-auto">
        <ul class="flex text-sm text-blue-500 space-x-2">
            <li><a href="{{ route('dashboard.index') }}" class="hover:underline">Home</a></li>
            <li>/</li>
            @foreach ($breadcrumbs as $breadcrumb)
                <li><a href="{{ url($breadcrumb['url']) }}" class="hover:underline">{{ $breadcrumb['name'] }}</a></li>
                @if (!$loop->last)
                    <li>/</li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>