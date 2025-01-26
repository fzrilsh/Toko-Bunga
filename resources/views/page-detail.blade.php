@extends('components.layouts.app')

@section('content')
<section class="grid grid-cols-3 max-sm:grid-cols-1 p-10 gap-5 max-sm:items-center">
    <div class="col-span-3 max-sm:col-span-1">
        <h1 class="font-titillium font-bold text-4xl mb-2 text-gray-700">{{ $page->title }}</h1>
        <p class="text-gray-600 mb-5">Ditulis oleh <span class="text-bridal-heath-700 font-bold">Admin</span> pada {{ \Carbon\Carbon::parse($page->created_at)->format('d F Y') }}</p>
        <svg class="" width="261" height="18" viewBox="0 0 261 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M110.996 1C110.996 1 113.055 5.11866 115.648 8.77778M115.648 8.77778C117.72 11.7023 120.132 14.3333 122.107 14.3333C124.983 14.3333 125.74 11.0765 127.287 8.77778M115.648 8.77778C113.055 12.4369 110.996 16.5556 110.996 16.5556M115.648 8.77778C117.72 5.85322 120.132 3.22222 122.107 3.22222C124.983 3.22222 125.74 6.47909 127.287 8.77778M127.287 8.77778C128.131 7.52418 129.21 6.55556 130.996 6.55556C132.781 6.55556 133.86 7.52418 134.704 8.77778M127.287 8.77778C128.131 10.0314 129.21 11 130.996 11C132.781 11 133.86 10.0314 134.704 8.77778M134.704 8.77778C136.251 11.0765 137.008 14.3333 139.884 14.3333C141.859 14.3333 144.272 11.7023 146.344 8.77778M134.704 8.77778C136.251 6.47909 137.008 3.22222 139.884 3.22222C141.859 3.22222 144.272 5.85323 146.344 8.77778M146.344 8.77778C148.936 5.11866 150.996 1 150.996 1M146.344 8.77778C148.936 12.4369 150.996 16.5556 150.996 16.5556"
                stroke="#93543B"
                stroke-width="3"
            />
            <line x1="100.986" y1="9.99996" x2="0.990632" y2="9.07407" stroke="#4B5563" stroke-width="2" />
            <line x1="260.982" y1="9.99996" x2="160.986" y2="9.07407" stroke="#4B5563" stroke-width="2" />
        </svg>
    </div>
    <div class="col-span-2 max-sm:col-span-1" id="editor-container">
        {!! $page->content !!}
    </div>
    <div class="col-span-1 max-sm:col-span-1 bg-bridal-heath-150 p-5 rounded-xl w-full sticky top-20 max-h-56">
        <h1 class="font-titillium font-bold text-2xl mb-4 text-gray-700">Iklan</h1>
        <img src="https://via.placeholder.com/300x200?text=Space Available" alt="Advertisement" class="w-full mb-4 rounded" />
        <p class="text-gray-600 text-sm">Tersedia space untuk iklan kerjasama disini.</p>
    </div>
</section>
@endsection

{{-- @section('content')
    <div class="container mx-auto mt-8 px-4 lg:px-0 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 my-2">
            <x-breadcrumb />
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $page->title }}</h1>
            <p class="text-gray-600 text-sm mb-6">Ditulis oleh <span class="font-semibold text-blue-500">Admin</span>
                pada <span class="italic">{{ \Carbon\Carbon::parse($page->created_at)->format('d F Y') }}</span></p>
            @if ($page?->featured_image)
                <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->slug }}"
                    class="w-full mb-6 rounded-lg shadow">
            @endif
            <div class="prose prose-blue bg-white pt-1 px-3 rounded shadow-lg py-2" id="editor-container">
                {!! $page->content !!}
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Iklan</h3>
                <img src="https://via.placeholder.com/300x200?text=Space Available" alt="Advertisement" class="w-full mb-4 rounded">
                <p class="text-gray-600 text-sm">
                    Tersedia space untuk iklan kerjasama disini.
                </p>
            </div>
        </div>
    </div>
@endsection --}}
