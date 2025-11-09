@extends('components.layouts.app')

@push('styling')
    <style>
        .image-display {
            transition: 0.6s ease all;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section with Gradient Background -->
    <section class="relative mt-20 pt-6 md:pt-12 pb-6 md:pb-8 px-4 bg-gradient-to-b from-bridal-heath-50 via-white to-bridal-heath-50/30 overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-bridal-heath-200/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-pink-200/20 rounded-full blur-3xl"></div>

        <div class="container mx-auto max-w-7xl relative z-10">
            <!-- Product Details Grid -->
            <div class="grid md:grid-cols-2 gap-6 md:gap-8 items-start">
                <!-- Left: Image & Variant Section -->
                <div class="space-y-4 md:space-y-6 w-full max-w-full overflow-hidden">
                    <!-- Main Image Card -->
                    <div class="relative bg-white rounded-2xl md:rounded-3xl shadow-2xl overflow-hidden p-4 md:p-8 group w-full">
                        <div class="absolute inset-0 bg-gradient-to-br from-bridal-heath-50/50 to-pink-50/50"></div>
                        <img src="{{ asset('storage/' . ($selectedType ? $selectedType->image : $product->image)) }}" 
                             alt="{{ $product->name }}" 
                             class="image-display relative z-10 w-full h-64 sm:h-72 md:h-[500px] lg:h-[600px] object-contain object-center group-hover:scale-105 transition-transform duration-700" />
                        
                        <!-- View Counter Badge -->
                        <div class="absolute top-3 right-3 md:top-6 md:right-6 bg-white/90 backdrop-blur-md px-3 py-2 md:px-4 md:py-2 rounded-xl md:rounded-2xl shadow-lg flex items-center gap-2 z-20">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span class="text-sm md:text-sm font-medium text-gray-700">{{ $product->viewers }} orang melihat</span>
                        </div>
                    </div>

                    @if (count($product->filteredType) > 0)
                        <div class="bg-white rounded-2xl md:rounded-3xl shadow-xl p-5 md:p-6 w-full">
                            <h3 class="text-lg md:text-lg font-bold text-gray-800 mb-4 md:mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 md:w-5 md:h-5 text-bridal-heath-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <span>Pilih Varian</span>
                            </h3>
                            
                            <div class="relative group/carousel">
                                <button id="scroll-left-btn" onclick="scrollType(-200)" 
                                        class="absolute left-0 z-10 bg-white/95 backdrop-blur-sm hover:bg-bridal-heath-100 p-3 md:p-2.5 rounded-full shadow-lg border border-gray-200 -translate-y-1/2 top-1/2 transition-all hover:scale-110 opacity-0 group-hover/carousel:opacity-100 disabled:opacity-0 disabled:cursor-not-allowed">
                                    <svg class="w-5 h-5 md:w-5 md:h-5 text-bridal-heath-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                            
                                <div class="snap-x snap-mandatory overflow-x-auto overflow-y-hidden flex gap-4 md:gap-4 px-2 py-2 scrollbar-thin scrollbar-thumb-bridal-heath-300 scrollbar-track-gray-100" 
                                     id="scroll-container" 
                                     style="scrollbar-width: thin; scrollbar-color: #d9b898 #f3f4f6;">
                                    @foreach ($product->filteredType as $type)
                                        <a href="{{ route('products.show', [$product, (isset($type['discount']) ? '' : 'type=' . $type['id'])]) }}" 
                                           class="snap-center group flex-none flex flex-col items-center">
                                            <div class="w-32 h-32 md:w-36 md:h-36 rounded-xl md:rounded-2xl overflow-hidden border-2 transition-all hover:scale-105 {{ $selectedType?->id === $type['id'] ? 'border-bridal-heath-600 shadow-lg ring-2 ring-bridal-heath-200' : 'border-gray-200 hover:border-bridal-heath-400' }} relative">
                                                <img src="{{ asset('storage/' . $type['image']) }}" 
                                                     alt="{{ $type['name'] }}" 
                                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                                                
                                                @if ($selectedType?->id === $type['id'])
                                                    <div class="absolute top-2 right-2 bg-bridal-heath-600 text-white rounded-full p-1">
                                                        <svg class="w-4 h-4 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <span class="mt-2 text-sm md:text-sm font-medium text-gray-700 text-center max-w-[128px] md:max-w-[144px] truncate {{ $selectedType?->id === $type['id'] ? 'text-bridal-heath-700 font-bold' : '' }}">
                                                {{ $type['name'] }}
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            
                                <button id="scroll-right-btn" onclick="scrollType(200)" 
                                        class="absolute right-0 z-10 bg-white/95 backdrop-blur-sm hover:bg-bridal-heath-100 p-3 md:p-2.5 rounded-full shadow-lg border border-gray-200 -translate-y-1/2 top-1/2 transition-all hover:scale-110 opacity-0 group-hover/carousel:opacity-100 disabled:opacity-0 disabled:cursor-not-allowed">
                                    <svg class="w-5 h-5 md:w-5 md:h-5 text-bridal-heath-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endif

                    <!-- Product Info Cards (Desktop Only - Below Variant) -->
                    <div class="md:grid hidden grid-cols-2 gap-4 mt-4 md:mt-6 w-full">
                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-5 border border-green-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-800 text-sm">Bunga Segar</h4>
                            </div>
                            <p class="text-xs text-gray-600 leading-relaxed">Bunga dipetik langsung & dijamin kesegaran hingga 7 hari</p>
                        </div>

                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-5 border border-blue-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-800 text-sm">Pengiriman Cepat</h4>
                            </div>
                            <p class="text-xs text-gray-600 leading-relaxed">Gratis ongkir area Tangerang & pengiriman tepat waktu</p>
                        </div>

                        <div class="bg-gradient-to-br from-purple-50 to-pink-100 rounded-2xl p-5 border border-purple-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-800 text-sm">Garansi Kualitas</h4>
                            </div>
                            <p class="text-xs text-gray-600 leading-relaxed">100% uang kembali jika produk tidak sesuai ekspektasi</p>
                        </div>

                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-5 border border-orange-200 hover:shadow-lg transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-800 text-sm">Bisa Custom</h4>
                            </div>
                            <p class="text-xs text-gray-600 leading-relaxed">Request desain khusus & tambahan kartu ucapan gratis</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Complete Sidebar (All Info) -->
                <div class="md:sticky md:top-24 w-full max-w-full overflow-hidden">
                    <!-- Single Combined Card with All Info -->
                    <div class="bg-white rounded-2xl md:rounded-3xl shadow-2xl overflow-hidden w-full">
                        <div class="p-5 md:p-8 border-b border-gray-100">
                            <h1 class="text-xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-3 md:mb-6 break-words leading-tight line-clamp-3">{{ $product->name }}</h1>

                            @if ($product['discount']['discounted'])
                                <div class="flex items-center gap-2 md:gap-3 mb-2 md:mb-3 flex-wrap">
                                    <span class="line-through text-gray-400 text-sm md:text-lg">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                                    <span class="bg-red-100 text-red-600 px-2.5 py-1 rounded-full text-xs md:text-sm font-bold uppercase">DISKON {{ $product['discount']['percent'] }}</span>
                                </div>
                                <p class="text-2xl md:text-4xl lg:text-5xl font-bold text-bridal-heath-700 break-all">Rp {{ number_format($product['discount']['price_after_discount'], 0, ',', '.') }}</p>
                            @else
                                <p class="text-2xl md:text-4xl lg:text-5xl font-bold text-bridal-heath-700 break-all">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                            @endif
                        </div>

                        <div class="p-5 md:p-8 bg-gradient-to-br from-white to-bridal-heath-50/30 border-b border-gray-100">
                            <div class="flex items-center mb-3 md:mb-4">
                                <div class="flex-shrink-0 w-fit h-fit mr-2 bg-bridal-heath-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-bridal-heath-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-base md:text-lg font-bold text-gray-900">Deskripsi Produk</h3>
                            </div>
                            <div class="prose prose-gray max-w-none max-h-none overflow-y-auto">
                                <p class="text-sm md:text-base text-gray-600 leading-relaxed break-words whitespace-pre-line">{!! $product->description !!}</p>
                            </div>
                        </div>

                        <div class="p-6 md:p-8">
                            <div class="mb-4 md:mb-5">
                                <label class="text-gray-800 font-bold mb-3 md:mb-3 block flex items-center gap-2 text-base md:text-base">
                                    <svg class="w-5 h-5 md:w-5 md:h-5 text-bridal-heath-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                    Atur Jumlah
                                </label>
                                <div class="flex items-center max-w-[11rem]">
                                    <button type="button" id="decrement-button"
                                            class="bg-bridal-heath-100 hover:bg-bridal-heath-200 border border-bridal-heath-300 rounded-l-xl p-3 md:p-3 h-12 md:h-11 focus:ring-2 focus:ring-bridal-heath-500 focus:outline-none transition-all hover:scale-105">
                                        <svg class="w-4 h-4 md:w-4 md:h-4 text-bridal-heath-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                    </button>
                                    <input type="text" id="quantity-input" name="quantity" data-input-counter value="1"
                                           class="bg-bridal-heath-50 border-x-0 border-bridal-heath-300 h-12 md:h-11 text-center text-bridal-heath-900 text-base md:text-base font-bold focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full"
                                           min="1" placeholder="1" required />
                                    <button type="button" id="increment-button" 
                                            class="bg-bridal-heath-100 hover:bg-bridal-heath-200 border border-bridal-heath-300 rounded-r-xl p-3 md:p-3 h-12 md:h-11 focus:ring-2 focus:ring-bridal-heath-500 focus:outline-none transition-all hover:scale-105">
                                        <svg class="w-4 h-4 md:w-4 md:h-4 text-bridal-heath-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-4 md:mb-5 flex items-center gap-2 text-green-600 bg-green-50 px-4 md:px-4 py-3 md:py-3 rounded-xl text-base md:text-base">
                                <svg class="w-5 h-5 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-semibold">Stok : Tersedia</span>
                            </div>

                            <div class="flex items-center justify-between mb-5 md:mb-5 pb-5 md:pb-5 border-b border-gray-200">
                                <span class="text-gray-600 text-base md:text-base font-semibold">Subtotal</span>
                                <p id="total" class="text-2xl md:text-2xl lg:text-3xl font-bold text-bridal-heath-700">Rp. 80.000</p>
                            </div>

                            <a role="button" id="whatsapp-button"
                               href="#"
                               target="_blank"
                               class="w-full bg-gradient-to-r from-bridal-heath-600 to-bridal-heath-700 hover:from-bridal-heath-700 hover:to-bridal-heath-800 text-white text-center font-bold py-4 md:py-4 px-4 md:px-6 rounded-xl shadow-lg transition-all duration-300 hover:scale-[1.02] hover:shadow-xl flex items-center justify-center gap-2 md:gap-3 text-base md:text-base">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span>Pesan Sekarang</span>
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>

                            <div class="grid grid-cols-2 gap-3 mt-6 md:mt-6">
                                <div class="flex items-center gap-2 bg-bridal-heath-50 px-3 py-3 rounded-lg text-sm md:text-sm">
                                    <svg class="w-4 h-4 text-bridal-heath-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Bunga Segar</span>
                                </div>
                                <div class="flex items-center gap-2 bg-bridal-heath-50 px-3 py-2.5 rounded-lg text-xs md:text-sm">
                                    <svg class="w-4 h-4 text-bridal-heath-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Pengiriman Cepat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products Section -->
    <section class="py-8 md:py-16 px-4 bg-gradient-to-b from-white to-bridal-heath-50">
        <div class="container mx-auto max-w-7xl">
            <!-- Section Header -->
            <div class="mb-6 md:mb-8">
                <div class="inline-flex items-center gap-2 px-3 md:px-4 py-1.5 md:py-2 bg-bridal-heath-100 rounded-full mb-2 md:mb-4">
                    <svg class="w-4 h-4 md:w-5 md:h-5 text-bridal-heath-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="text-bridal-heath-700 font-semibold text-xs md:text-sm">Rekomendasi Untuk Anda</span>
                </div>
                <h2 class="text-xl md:text-3xl font-bold text-gray-900 mb-1 md:mb-2">Produk Lainnya</h2>
                <p class="text-sm md:text-base text-gray-600">Jelajahi koleksi bunga segar pilihan kami lainnya</p>
            </div>

            <!-- Products Carousel -->
            <div class="relative flex justify-center">
                <div class="flex overflow-x-auto gap-6 md:gap-8 pb-4 snap-x snap-mandatory scroll-smooth scrollbar-hide">
                    @foreach ($products as $item)
                        <div class="snap-center flex-none w-72 sm:w-80 group">
                            <div class="relative bg-gradient-to-br from-white to-gray-50 rounded-3xl overflow-hidden shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                                <!-- Image Container with Gradient Overlay -->
                                <div class="relative h-80 overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->image) }}" 
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
                                            <span class="text-4xl font-bold text-gray-900">{{ number_format($item['discount']['discounted'] ? $item['discount']['price_after_discount'] : $item['price'], 0, ',', '.') }}</span>
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
                                    <a href="{{ route('products.show', $item) }}" 
                                       class="group/btn flex items-center justify-center gap-2 w-full bg-bridal-heath-700 hover:bg-bridal-heath-800 text-white px-6 py-3.5 rounded-xl font-bold transition-all duration-300 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98]">
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
@endsection

@push('scripts')

    {{-- Quantity calculation --}}
    <script>
        // Product data
        const productName = @json($product->name);
        const productUrl = @json(route('products.show', $product));
        const whatsappNumber = @json($options->where('key', 'whatsapp')->first()?->value);
        const appName = @json($nama_aplikasi);
        const basePrice = {{ $product['price'] }};
        const discountPercent = {{ (int)$product['discount']['percent'] ?? 0 }};
        
        // Elements
        const quantityInput = document.querySelector('#quantity-input');
        const incrementBtn = document.querySelector('#increment-button');
        const decrementBtn = document.querySelector('#decrement-button');
        const totalEl = document.querySelector('#total');
        const whatsappBtn = document.querySelector('#whatsapp-button');

        // Calculate subtotal
        function calculateSubtotal(quantity) {
            const totalPrice = quantity * basePrice;
            const discountAmount = totalPrice * (discountPercent / 100);
            return totalPrice - discountAmount;
        }

        // Format Rupiah
        function formatRupiah(number) {
            return number.toLocaleString('id-ID', { minimumFractionDigits: 0 });
        }

        // Update subtotal and WhatsApp link
        function updateSubtotal() {
            let quantity = parseInt(quantityInput.value) || 1;
            
            // Ensure quantity is at least 1
            if (quantity < 1) {
                quantity = 1;
                quantityInput.value = 1;
            }
            
            const subtotal = calculateSubtotal(quantity);
            totalEl.innerHTML = `Rp ${formatRupiah(subtotal)}`;
            
            // Disable decrement button if quantity is 1
            decrementBtn.disabled = quantity <= 1;
            if (quantity <= 1) {
                decrementBtn.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                decrementBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            }

            // Update WhatsApp link
            updateWhatsAppLink(quantity, subtotal);
        }

        // Update WhatsApp link with quantity and subtotal
        function updateWhatsAppLink(quantity, subtotal) {
            const message = `Halo ${appName},%0A%0ASaya tertarik dengan produk kamu:%0A%0A` +
                `*Produk:* ${productName}%0A` +
                `*Link:* ${productUrl}%0A` +
                `*Quantity:* ${quantity}%0A` +
                `*Subtotal:* Rp ${formatRupiah(subtotal)}%0A%0A` +
                `Apakah produk tersebut masih tersedia? Kalau ada, saya ingin tahu lebih lanjut ya!%0A%0A` +
                `Terima kasih.`;
            
            whatsappBtn.href = `https://wa.me/${whatsappNumber}?text=${message}`;
        }

        // Increment button click
        incrementBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value) || 1;
            quantityInput.value = currentValue + 1;
            updateSubtotal();
        });

        // Decrement button click
        decrementBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value) || 1;
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateSubtotal();
            }
        });

        // Input validation - only allow numbers
        quantityInput.addEventListener('input', () => {
            let value = quantityInput.value;
            value = value.replace(/[^0-9]/g, '');
            quantityInput.value = value;
        });

        // Update on blur
        quantityInput.addEventListener('blur', updateSubtotal);

        // Update on Enter key
        quantityInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                updateSubtotal();
            }
        });

        // Initial calculation
        updateSubtotal();
    </script>

    {{-- Variant Scrolling --}}
    <script>
        const scrollContainer = document.getElementById('scroll-container');
        const scrollLeftBtn = document.getElementById('scroll-left-btn');
        const scrollRightBtn = document.getElementById('scroll-right-btn');

        function scrollType(value) {
            scrollContainer.scrollBy({
                left: value,
                behavior: 'smooth'
            });
        }

        // Update scroll buttons visibility
        function updateScrollButtons() {
            if (!scrollContainer) return;
            
            const scrollLeft = scrollContainer.scrollLeft;
            const scrollWidth = scrollContainer.scrollWidth;
            const clientWidth = scrollContainer.clientWidth;
            
            // Disable left button if at start
            if (scrollLeftBtn) {
                scrollLeftBtn.disabled = scrollLeft <= 0;
            }
            
            // Disable right button if at end
            if (scrollRightBtn) {
                scrollRightBtn.disabled = scrollLeft + clientWidth >= scrollWidth - 1;
            }
        }

        // Listen to scroll events
        if (scrollContainer) {
            scrollContainer.addEventListener('scroll', updateScrollButtons);
            
            // Initial check
            updateScrollButtons();
            
            // Recheck on window resize
            window.addEventListener('resize', updateScrollButtons);
        }
    </script>

    {{-- Hide Scrollbar for Related Products --}}
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endpush