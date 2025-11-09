<section class="relative w-full py-20 overflow-hidden" id="tentang-kami">
    <!-- Decorative Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-bridal-heath-50 via-white to-pink-50"></div>
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-bridal-heath-200/30 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-pink-200/30 rounded-full blur-3xl animate-pulse delay-1000"></div>
    </div>

    <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Section Header with Centered Layout -->
        <div class="text-center mb-16 max-w-4xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full mb-6 shadow-md">
                <svg class="w-4 h-4 text-bridal-heath-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                </svg>
                <span class="text-bridal-heath-700 font-semibold text-sm">Tentang Kami</span>
            </div>
            <h2 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-gray-800 font-titillium mb-6 leading-tight">
                Inilah bagaimana kamu
                <span class="block text-bridal-heath-600 font-dancing mt-3">mengenal kami</span>
            </h2>
            <p class="text-gray-600 text-xl leading-relaxed max-w-3xl mx-auto">
                {{ $options->where('key', 'latar belakang')->first()?->value }}
            </p>
        </div>

    </div>
</section>
