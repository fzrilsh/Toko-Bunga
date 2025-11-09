@extends('components.layouts.app')

@section('content')
    <!-- Hero Section with Search -->
    <section
        class="relative w-full mt-20 bg-gradient-to-br from-bridal-heath-50 via-white to-bridal-heath-100 py-16 px-4 sm:px-6 lg:px-8">
        <!-- Decorative Background -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-10 right-10 w-64 h-64 bg-bridal-heath-200/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 left-10 w-64 h-64 bg-pink-200/20 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-md mb-6">
                <svg class="w-5 h-5 text-bridal-heath-600" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="text-bridal-heath-700 font-semibold font-dancing text-lg">Koleksi Lengkap</span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-800 font-titillium mb-4 leading-tight">
                Temukan Bunga
                <span class="block text-bridal-heath-600 mt-2">Yang Sempurna Untuk Anda</span>
            </h1>
            <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
                Jelajahi koleksi bunga segar pilihan kami untuk setiap momen spesial Anda
            </p>

            <!-- Search Form -->
            <form class="max-w-2xl mx-auto" action="{{ route('products.index') }}" method="GET">
                <div class="relative group">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-bridal-heath-400 to-pink-400 rounded-full blur opacity-25 group-hover:opacity-40 transition duration-300">
                    </div>
                    <div class="relative flex items-center bg-white rounded-full shadow-lg overflow-hidden">
                        <input type="text" id="search" name="search" value="{{ $search }}"
                            class="flex-1 px-4 py-4 text-gray-900 focus:outline-none border-0 bg-transparent"
                            placeholder="Cari bunga berdasarkan nama, kategori, atau acara..." />
                        <button type="submit"
                            class="mr-2 px-6 py-3 bg-gradient-to-r from-bridal-heath-600 to-bridal-heath-700 hover:from-bridal-heath-700 hover:to-bridal-heath-800 font-semibold rounded-full transition-all duration-300 hover:shadow-lg hover:scale-105 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="hidden sm:inline">Cari</span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Search Info -->
            @if ($search)
                <div class="mt-6 inline-flex items-center gap-2 px-4 py-2 bg-bridal-heath-100 rounded-full">
                    <span class="text-gray-700">Hasil pencarian untuk:</span>
                    <span class="font-semibold text-bridal-heath-700">"{{ $search }}"</span>
                    <a href="{{ route('products.index') }}" class="ml-2 text-gray-500 hover:text-gray-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>

    @forelse ($products as $category => $items)
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <!-- Category Header -->
                <div class="mb-12 text-center">
                    @if ($loop->first)
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-bridal-heath-50 rounded-full mb-4">
                            <svg class="w-5 h-5 text-bridal-heath-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                            <span class="text-bridal-heath-700 font-semibold font-dancing">Semua Produk Kami</span>
                        </div>
                    @endif
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 font-titillium">{{ ucwords($category) }}</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-bridal-heath-500 to-pink-500 mx-auto mt-4 rounded-full">
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="w-full px-4">
                    <div class="flex flex-row flex-wrap justify-center gap-6 max-w-screen-xl mx-auto">
                        @foreach ($items as $item)
                        <div class="group w-80 flex-shrink-0">
                            <div class="relative bg-gradient-to-br from-white to-gray-50 rounded-3xl overflow-hidden shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                                <!-- Image Container with Gradient Overlay -->
                                <div class="relative h-80 overflow-hidden">
                                    <img src="{{ 'storage/' . $item->image }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                                        alt="{{ $item->name }}" />
                                    
                                    <!-- Gradient Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                    
                                    <!-- Discount Badge -->
                                    @if ($item['discount']['discounted'])
                                        <div class="absolute top-6 left-6 bg-red-500 text-white px-4 py-2 rounded-2xl text-sm font-bold shadow-xl backdrop-blur-sm flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <span>{{ $item['discount']['percent'] }}</span>
                                        </div>
                                    @endif

                                    <!-- View Counter -->
                                    <div class="absolute top-6 right-6 bg-white/90 backdrop-blur-md text-gray-700 px-3 py-2 rounded-xl text-xs font-medium flex items-center gap-1.5 shadow-lg">
                                        <svg class="w-4 h-4 text-bridal-heath-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="font-semibold">{{ $item->viewers }}</span>
                                    </div>

                                    <!-- Title Overlay on Image -->
                                    <div class="absolute bottom-0 left-0 right-0 p-6">
                                        <h3 class="text-white text-2xl font-bold drop-shadow-lg line-clamp-2 font-titillium">
                                            {{ $item->name }}
                                        </h3>
                                    </div>
                                </div>

                                <!-- Content Section -->
                                <div class="p-6 bg-white space-y-4">
                                    <!-- Category/Type Badge -->
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-bridal-heath-50 text-bridal-heath-700 rounded-full text-xs font-semibold">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Premium</span>
                                        </span>
                                        <span class="text-xs text-gray-500">• Bunga Segar</span>
                                    </div>

                                    <!-- Pricing -->
                                    <div class="border-t border-b border-gray-100 py-3">
                                        @if ($item['discount']['discounted'])
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-gray-400 line-through text-base">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                                <span class="text-white text-xs font-bold bg-red-500 px-2.5 py-1 rounded-lg">HEMAT {{ $item['discount']['percent'] }}</span>
                                            </div>
                                        @endif
                                        <div class="flex items-baseline gap-2">
                                            <span class="text-gray-600 text-base font-medium">Rp</span>
                                            <span class="text-4xl font-bold text-gray-900">{{ number_format($item['discount']['price_after_discount'], 0, ',', '.') }}</span>
                                        </div>
                                    </div>

                                    <!-- Features/Info -->
                                    <div class="flex items-center justify-between text-xs text-gray-600">
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="font-medium">Design Terkini</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                                                <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                                            </svg>
                                            <span class="font-medium">Same Day Delivery</span>
                                        </div>
                                    </div>

                                    <!-- CTA Button -->
                                    <a href="{{ route('products.show', $item) }}" class="group/btn flex items-center justify-center gap-2 w-full bg-bridal-heath-700 hover:bg-bridal-heath-800 text-white px-6 py-3.5 rounded-xl font-bold transition-all duration-300 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                        </svg>
                                        <span>Pesan Sekarang</span>
                                        <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>

                                <!-- Decorative Corner -->
                                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-bridal-heath-200/20 to-transparent rounded-bl-full"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </section>
    @empty
        <!-- Empty State -->
        <section class="py-20 px-4 bg-gradient-to-b from-white to-bridal-heath-50">
            <div class="max-w-2xl mx-auto text-center">
                <!-- SVG Illustration -->
                <div class="mb-8 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 1920 1080"
                        class="w-full max-w-md opacity-80">
                        <g fill="#dba865" opacity=".2">
                            <ellipse cx="906.5" cy="1046.6" rx="337.2" ry="33.4" />
                            <path
                                d="M671 1021.7c-1.7-1.6-249.3-347.5-43.9-456 279.5-147.8-92.7-647 423.3-554.3 496.8 89.2-102.4 483.3 101.1 627.3 133.5 94.4 211 321.2-68.2 394-177.1 46-369.2 29.3-412.3-11z" />
                        </g>
                        <g fill="#dba865">
                            <path
                                d="M837.2 724.7c0-65.4 7.4-116.9 22.2-154.8 14.8-37.8 38.7-70.6 71.9-98.4 33.1-27.8 58.3-53.2 75.5-76.2 17.2-23.1 25.9-48.5 25.9-76.2 0-67.6-29.1-101.4-87.3-101.4-26.9 0-48.6 9.9-65.1 29.5-16.6 19.7-25.3 46.3-26.2 79.9H627c.9-89.5 29.1-159.2 84.6-209.2C767.1 68 831.1 39.7 931.4 39.7c99.8 0 191 26.4 245.9 72.5 54.8 46.1 82.3 111.7 82.3 196.7 0 37.2-7.4 71-22.2 101.4-14.8 30.4-38.5 61.6-71.2 93.3l-77.2 71.9c-21.9 21-37.2 42.6-45.7 64.8-8.5 22.2-13.2 50.3-14.1 84.3h-192zm-27.5 204.2c0-33.1 30.9-87 54.9-108.3 0 0 31.4-8.5 67.3-8.5 35.8 0 69.1 13.9 93 35.2 23.9 21.3 35.9 48.5 35.9 81.6 0 33.1-12 60.3-35.9 81.6-24 21.3-53.8 31.9-89.6 31.9s-65.7-10.6-89.6-31.9c-24-21.3-36-48.5-36-81.6z"
                                opacity=".2" />
                            <path
                                d="M807.1 724.7c0-65.4 7.4-116.9 22.2-154.8 14.8-37.8 38.7-70.6 71.9-98.4 33.1-27.8 58.3-53.2 75.5-76.2 17.2-23.1 25.9-48.5 25.9-76.2 0-67.6-29.1-101.4-87.3-101.4-26.9 0-48.6 9.9-65.1 29.5-16.6 19.7-25.3 46.3-26.2 79.9H597c.8-89.4 29-159.1 84.5-209.1C737 68.1 814.9 43.2 915.2 43.2c99.8 0 177.2 23.1 232 69.2 54.8 46.1 82.3 111.7 82.3 196.7 0 37.2-7.4 71-22.2 101.4-14.8 30.4-38.5 61.6-71.2 93.3l-77.2 71.9c-21.9 21-37.2 42.6-45.7 64.8-8.5 22.2-13.2 50.3-14.1 84.3h-192zm-27.6 204.2c0-33.1 12-60.3 35.9-81.6 23.9-21.3 53.8-31.9 89.6-31.9s65.7 10.6 89.6 31.9c23.9 21.3 35.9 48.5 35.9 81.6 0 33.1-12 60.3-35.9 81.6-24 21.3-53.8 31.9-89.6 31.9s-65.7-10.6-89.6-31.9c-23.9-21.3-35.9-48.5-35.9-81.6z" />
                        </g>
                    </svg>
                </div>

                <!-- Empty Message -->
                <h2 class="text-3xl font-bold text-gray-800 mb-4 font-titillium">Produk Tidak Ditemukan</h2>
                <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto">
                    Maaf, kami tidak dapat menemukan produk yang Anda cari. Coba sesuaikan pencarian atau jelajahi kategori
                    lainnya.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('dashboard.index') }}"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-bridal-heath-600 to-bridal-heath-700 hover:from-bridal-heath-700 hover:to-bridal-heath-800 text-white font-semibold rounded-xl transition-all duration-300 hover:shadow-lg hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Kembali ke Beranda</span>
                    </a>
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white hover:bg-bridal-heath-50 text-bridal-heath-700 font-semibold rounded-xl border-2 border-bridal-heath-600 transition-all duration-300 hover:shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span>Reset Pencarian</span>
                    </a>
                </div>
            </div>
        </section>
    @endforelse
@endsection
