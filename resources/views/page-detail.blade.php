@extends('components.layouts.app')

@push('styling')
@endpush

@section('content')
    <div class="container mx-auto mt-8 px-4 lg:px-0 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 my-2">
            <x-breadcrumb />
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $page->title }}</h1>
            <p class="text-gray-600 text-sm mb-6">Ditulis oleh <span class="font-semibold text-blue-500">Admin</span>
                pada <span class="italic">{{ \Carbon\Carbon::parse($page->created_at)->format('d F Y') }}</span></p>
            @if ($page?->featured_image)
                <img src="{{ asset('public/storage/' . $page->featured_image) }}" alt="{{ $page->slug }}"
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
@endsection
