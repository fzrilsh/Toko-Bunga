<header class="fixed top-0 left-0 right-0 z-50 bg-white/70 backdrop-blur-lg border-b border-white/20 shadow-lg transition-all duration-300">
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo Section -->
            <div class="flex-shrink-0">
                <a href="{{ route('dashboard.index') }}" class="flex items-center space-x-3 group">
                    <div class="relative">
                        <img src="{{ asset('imgs/logo.jpg') }}" class="h-12 w-12 md:h-16 md:w-16 rounded-full ring-2 ring-bridal-heath-300 group-hover:ring-bridal-heath-500 transition-all duration-300 shadow-md" alt="Logo" />
                        <div class="absolute -bottom-1 -right-1 bg-bridal-heath-500 rounded-full p-1">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <span class="text-xl font-bold text-gray-800 group-hover:text-bridal-heath-700 transition-colors font-titillium">Damai Agung Florist</span>
                        <p class="text-xs text-gray-500">Toko Bunga Tangerang</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('dashboard.index') }}" class="relative px-4 py-2 text-base font-medium rounded-lg transition-all duration-300 {{ request()->routeIs('dashboard.index') ? 'text-bridal-heath-700 bg-bridal-heath-100' : 'text-gray-700 hover:text-bridal-heath-600 hover:bg-bridal-heath-50' }}">
                    <span class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Beranda</span>
                    </span>
                    @if(request()->routeIs('dashboard.index'))
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-bridal-heath-600 rounded-full"></span>
                    @endif
                </a>
                <a href="{{ route('dashboard.index') }}#tentang-kami" class="relative px-4 py-2 text-base font-medium rounded-lg transition-all duration-300 text-gray-700 hover:text-bridal-heath-600 hover:bg-bridal-heath-50 scroll-smooth">
                    <span class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Tentang</span>
                    </span>
                </a>
                <a href="{{ route('products.index') }}" class="relative px-4 py-2 text-base font-medium rounded-lg transition-all duration-300 {{ request()->routeIs('products.index') ? 'text-bridal-heath-700 bg-bridal-heath-100' : 'text-gray-700 hover:text-bridal-heath-600 hover:bg-bridal-heath-50' }}">
                    <span class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <span>Produk</span>
                    </span>
                    @if(request()->routeIs('products.index'))
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-bridal-heath-600 rounded-full"></span>
                    @endif
                </a>
                <a href="{{ route('dashboard.index') }}#layanan-kami" class="relative px-4 py-2 text-base font-medium rounded-lg transition-all duration-300 text-gray-700 hover:text-bridal-heath-600 hover:bg-bridal-heath-50 scroll-smooth">
                    <span class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Layanan</span>
                    </span>
                </a>
            </div>

            <!-- Search & Mobile Menu Button -->
            <div class="flex items-center space-x-3">
                <!-- Search Button -->
                <div class="relative">
                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdown" data-dropdown-placement="bottom" data-dropdown-offset-distance="25" class="flex items-center justify-center w-10 h-10 rounded-full bg-bridal-heath-100 hover:bg-bridal-heath-200 text-bridal-heath-700 transition-all duration-300 hover:scale-110 hover:shadow-md" type="button" aria-label="Search">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <!-- Search Dropdown -->
                    <div id="dropdown" class="z-10 hidden bg-white/70 backdrop-blur-lg rounded-xl shadow-2xl w-80 sm:w-96 p-4 border border-white/20">
                        <form action="{{ route('products.index') }}">
                            <div class="flex items-center gap-2">
                                <input type="text" id="search" name="search" class="flex-1 bg-white/50 backdrop-blur-sm border border-white/30 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-bridal-heath-500 focus:border-transparent px-4 py-3 transition-all placeholder:text-gray-600" placeholder="Cari bunga impian Anda..." required />
                                <button type="submit" class="flex-shrink-0 p-3 text-bridal-heath-700 rounded-xl transition-all duration-300 hover:shadow-lg">
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button data-collapse-toggle="mobile-menu-3" type="button" class="md:hidden flex items-center justify-center w-10 h-10 rounded-full bg-bridal-heath-100 hover:bg-bridal-heath-200 text-bridal-heath-700 transition-all duration-300 hover:scale-110" aria-controls="mobile-menu-3" aria-expanded="false" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="hidden md:hidden pb-4" id="mobile-menu-3">
            <div class="space-y-2 pt-2">
                <a href="{{ route('dashboard.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('dashboard.index') ? 'bg-bridal-heath-100 text-bridal-heath-700' : 'text-gray-700 hover:bg-bridal-heath-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium">Beranda</span>
                </a>
                <a href="{{ route('dashboard.index') }}#tentang-kami" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-300 text-gray-700 hover:bg-bridal-heath-50 scroll-smooth">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">Tentang</span>
                </a>
                <a href="{{ route('products.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('products.index') ? 'bg-bridal-heath-100 text-bridal-heath-700' : 'text-gray-700 hover:bg-bridal-heath-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="font-medium">Produk</span>
                </a>
                <a href="{{ route('dashboard.index') }}#layanan-kami" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-300 text-gray-700 hover:bg-bridal-heath-50 scroll-smooth">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="font-medium">Layanan</span>
                </a>
            </div>
        </div>
    </nav>
</header>
