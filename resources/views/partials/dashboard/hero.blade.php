<section class="relative min-h-screen w-full overflow-hidden flex justify-center items-center flex-col gap-10">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('imgs/welcome.jpeg') }}'); background-position: 60% center;">
        <div class="absolute inset-0 bg-gradient-to-br from-black/75 via-bridal-heath-900/65 to-black/75"></div>
        <!-- Decorative Blur Circles -->
        <div class="absolute top-20 left-10 w-96 h-96 bg-bridal-heath-500/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-pink-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 mt-21">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Decorative Top Element -->
            <div class="mb-6 flex justify-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                    <svg class="w-5 h-5 text-bridal-heath-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="text-white text-sm font-medium">Premium Florist Tangerang</span>
                </div>
            </div>

            <!-- Main Heading with Animation -->
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                <span class="block text-white font-titillium mb-2">Rasakan Keanggunan</span>
                <span class="block text-bridal-heath-200 font-dancing drop-shadow-lg">Bunga Segar</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-white/90 text-xl sm:text-2xl font-lora font-light mb-8 max-w-2xl mx-auto leading-relaxed">
                {{ $options->where('key', 'selogan')->first()?->value }}
            </p>

            <!-- Decorative Divider -->
            <div class="flex items-center justify-center gap-3 mb-10">
                <div class="w-12 h-px bg-gradient-to-r from-transparent to-white/50"></div>
                <svg class="w-6 h-6 text-bridal-heath-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                <div class="w-12 h-px bg-gradient-to-l from-transparent to-white/50"></div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="{{ route('products.index') }}" class="group relative px-8 py-4 bg-gradient-to-r from-bridal-heath-600 to-bridal-heath-700 hover:from-bridal-heath-700 hover:to-bridal-heath-800 text-white font-semibold rounded-full transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-bridal-heath-500/50 flex items-center gap-2">
                    <span>Jelajahi Koleksi</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                
                <a href="https://wa.me/{{ $options->where('key', 'whatsapp')->first()?->value }}" class="group px-8 py-4 bg-white/10 backdrop-blur-md hover:bg-white/20 text-white font-semibold rounded-full border-2 border-white/30 hover:border-white/50 transition-all duration-300 hover:scale-105 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span>Hubungi Kami</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="mt-12 flex flex-wrap justify-center items-center gap-8 text-white/80">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-bridal-heath-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="text-sm font-medium">100% Bunga Segar</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-bridal-heath-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">Pengiriman Cepat</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-bridal-heath-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">Terpercaya</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="z-10">
        <div class="flex flex-col items-center gap-2 text-white/60 animate-bounce">
            <span class="text-xs font-medium">Scroll untuk lebih banyak</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </div>
    </div>
</section>

