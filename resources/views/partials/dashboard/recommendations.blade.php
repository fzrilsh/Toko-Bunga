<section class="relative w-full py-20 bg-gradient-to-b from-white via-bridal-heath-50/30 to-white overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -left-40 w-80 h-80 bg-bridal-heath-200/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -right-40 w-80 h-80 bg-pink-200/20 rounded-full blur-3xl"></div>
    </div>

    <!-- Animated Flower Decorations -->
    <div class="absolute left-0 top-0 z-10 animate-left opacity-60 max-lg:hidden">
        <img src="{{ asset('imgs/scroll_flower.png') }}" alt="Scroll Flower" class="w-64 h-auto" />
    </div>
    <div class="absolute right-0 top-0 z-10 animate-right opacity-60 max-lg:hidden">
        <img src="{{ asset('imgs/scroll_flower_right.png') }}" alt="Scroll Flower" class="w-64 h-auto" />
    </div>

    <div class="relative z-20 container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-bridal-heath-100 rounded-full mb-4">
                <svg class="w-4 h-4 text-bridal-heath-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="text-bridal-heath-700 font-medium text-sm">Damai Agung Florist Showcase</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-800 font-titillium mb-4">
                Rekomendasi Bunga
                <span class="block text-bridal-heath-600 font-dancing mt-2">Khusus Untukmu</span>
            </h2>
            <p class="text-gray-600 text-lg">Pilihan terbaik rangkaian bunga segar yang dipilih khusus untuk momen spesial Anda</p>
        </div>

        <!-- Products Carousel -->
        <div class="relative flex justify-center">
            <div class="flex overflow-x-auto gap-8 pb-4 snap-x snap-mandatory scroll-smooth scrollbar-hide">
                @foreach ($diminati as $item)
                    <div class="snap-center flex-none w-72 sm:w-80 group">
                        <div class="relative bg-gradient-to-br from-white to-gray-50 rounded-3xl overflow-hidden shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                            <!-- Image Container with Gradient Overlay -->
                            <div class="relative h-80 overflow-hidden">
                                <img src="{{ 'storage/' . $item->image }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $item->name }}" />
                                
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

        <!-- View All Link -->
        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="group inline-flex items-center gap-3 px-8 py-4 bg-bridal-heath-800 text-white font-bold rounded-full shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 active:translate-y-0">
                <span>Jelajahi Semua Produk</span>
                <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Custom Scrollbar Hide & Button Animation -->
<style>
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.bg-size-200 {
    background-size: 200%;
}
.bg-pos-0 {
    background-position: 0%;
}
.bg-pos-100 {
    background-position: 100%;
}
</style>
