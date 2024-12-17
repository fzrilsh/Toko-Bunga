@extends('components.layouts.app')

@section('content')
    <section class="py-12 bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Cari Bunga Yang Kamu Butuhkan</h1>
            <form class="relative max-w-xl mx-auto md:flex md:gap-4" action="{{ route('products.index') }}" method="GET">
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari produk..."
                    class="w-full py-3 pl-4 pr-12 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                <button
                    class="md:relative absolute right-0 top-0 text-white flex items-center justify-center px-5 py-3 bg-blue-500 rounded-md hover:bg-blue-600 transition">
                    <i class="fas fa-search text-lg"></i>
                </button>
            </form>
        </div>
    </section>

    <section class="py-12">
        @if (!count($products))
            <div class="w-full h-48 flex justify-center items-center">
                <h1 class="bg-white shadow-2xl p-14 rounded-lg font-bold text-lg">BUNGA UNTUKMU BELUM BISA DITEMUKAN</h1>
            </div>
        @else
            @foreach ($products as $category => $items)
                <div class="container mx-auto px-4 py-2">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">{{ $category }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($items as $product)
                            <div class="relative bg-white border border-gray-200 rounded-md shadow-sm hover:shadow-lg hover:scale-105 transition">
                                <img src="{{ asset('public/storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-contain rounded-t-md">
                                @if ($product['discount']['discounted'])
                                    <div class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold py-1 px-3 rounded-full">
                                        Diskon {{ $product['discount']['percent'] }}
                                    </div>
                                @endif
                                <div class="p-4 flex md:block justify-center items-center flex-col">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                                    <span class="text-xs opacity-55"><i class="fas fa-eye"></i> {{ $product->viewers }} orang melihat</span>
                                    @if ($product['discount']['discounted'])
                                        <div class="flex items-end gap-2 mt-2">
                                            <span class="text-[10px] text-gray-500 line-through">{{ 'Rp ' . number_format($product['price'], 0, ',', '.') }}</span>
                                            <span class="font-semibold text-blue-600">{{ 'Rp ' . number_format($product['discount']['price_after_discount'], 0, ',', '.') }}</span>
                                        </div>
                                    @else
                                        <p class="text-gray-500 mt-1">
                                            {{ 'Rp ' . number_format($product['price'], 0, ',', '.') }}
                                        </p>
                                    @endif
                                    <a class="block text-center mt-4 w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition"
                                        href="{{ route('products.show', $product) }}">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </section>
@endsection
