@extends('components.layouts.app')

@section('content')
    <div class="container mx-auto mt-6 px-4 py-4 lg:flex">
        <div class="flex-1">

            <h1 class="text-3xl font-bold text-gray-800 mb-6">Konten Terbaru Kami</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($pages as $page)
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        {{-- <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}"
                            class="w-full h-48 object-cover"> --}}
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800 hover:text-blue-500">
                                <a href="{{ route('pages.show', $page) }}">{{ $page->title }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm mt-2">{{ $page->excerpt }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span
                                    class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($page->created_at)->format('M d, Y') }}</span>
                                <a href="{{ route('pages.show', $page) }}"
                                    class="text-blue-500 hover:underline text-sm">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
