@use(\App\Models\Option)
@use(\Illuminate\Support\Facades\Cache)

@php
    $options = Cache::remember('options', 60, function () {
        return Option::all();
    });
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if (request()->routeIs('products.show'))
        {!! seo($product ?? null) !!}
    @elseif (request()->routeIs('pages.show'))
        {!! seo($page ?? null) !!}
    @else
        <title>{{ $pageTitle }} - {{ $options->where('key', 'nama aplikasi')->first()?->value }}</title>
        <meta name="description" content="Damai Agung Florist hadir untuk membuat setiap momen Anda lebih indah dan bermakna. Percayakan kebutuhan bunga Anda kepada kami, karena kami mengerti pentingnya menyampaikan perasaan melalui keindahan bunga.">
        <meta name="robots" content="index, follow">
        <meta name="author" content="{{ $pageTitle ?? $options->where('key', 'nama aplikasi')->first()?->value }}">

        <meta name="keywords" content="toko bunga, toko bunga tangerang, bunga tangerang, akema, akema agung, Damai Agung Florist, aema">
        <link rel="sitemap" title="Sitemap" href="{{ asset('public/sitemap.xml') }}" type="application/xml">
        <link rel="canonical" href="{{ config('app.url') }}">
        <link rel="icon" type="image/jpg" href="{{ asset('public/imgs/logo.png') }}">

        <meta property="og:title" content="Toko Bunga">
        <meta property="og:description" content="Damai Agung Florist hadir untuk membuat setiap momen Anda lebih indah dan bermakna. Percayakan kebutuhan bunga Anda kepada kami, karena kami mengerti pentingnya menyampaikan perasaan melalui keindahan bunga.">
        <meta property="og:image" content="{{ asset('public/imgs/logo.png') }}">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:type" content="website">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Toko Bunga">
        <meta name="twitter:description" content="Damai Agung Florist hadir untuk membuat setiap momen Anda lebih indah dan bermakna. Percayakan kebutuhan bunga Anda kepada kami, karena kami mengerti pentingnya menyampaikan perasaan melalui keindahan bunga.">
        <meta name="twitter:image" content="{{ asset('public/imgs/logo.png') }}">
    @endif


    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .navbar-blur {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.7);
        }

        .navbar-scrolled {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .social-media {
            display: flex;
            gap: 16px;
        }

        .social-icon {
            position: relative;
            display: inline-block;
            opacity: 1;
            transition: opacity .3s ease-in-out;
        }

        .social-icon:hover {
            /* opacity: .6; */
        }

        .social-icon:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding: 8px 12px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            border-radius: 4px;
            font-size: 14px;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.2s ease-in-out;
        }

        .social-icon::after {
            content: '';
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease-in-out;
        }
    </style>

    @if (env('APP_ENV') === 'production')
        <link rel="stylesheet" href="{{ asset('public/build/assets/app.css') }}">        
    @else
        @vite('resources/css/app.css')
    @endif

    @stack('styling')
</head>

<body class="bg-blue-50 text-gray-800 font-sans">

    <nav id="navbar" class="sticky top-0 w-full z-50 transition-all duration-300 navbar-blur">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('dashboard.index') }}"
                class="text-2xl font-bold text-blue-500">{{ $options->where('key', 'nama aplikasi')->first()?->value }}</a>

            <ul class="hidden md:flex space-x-6 justify-center items-center">
                <div @class([
                    'relative',
                    'hidden',
                    'md:flex',
                    'items-center',
                    'collapse' => request()->routeIs('products.index'),
                ])>
                    <form class="relative md:flex items-center" action="{{ route('products.index') }}" method="GET">
                        <input type="text" id="search" name="search"
                            class="w-64 py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Cari produk...">
                        <button type="submit"
                            class="ml-1 right-2 top-2 text-white flex items-center justify-center w-10 h-10 bg-blue-500 rounded-md hover:bg-blue-600 transition">
                            <i class="fas fa-search text-lg"></i>
                        </button>
                    </form>
                </div>
                <li><a href="{{ route('dashboard.index', ['#home']) }}"
                        class="text-blue-800 hover:underline">Dashboard</a></li>
                <li><a href="{{ route('products.index') }}" class="text-blue-800 hover:underline">Products</a></li>
                <li><a href="https://wa.me/{{ $options->where('key', 'whatsapp')->first()?->value }}"
                        class="text-blue-800 hover:underline">Hubungi Kami</a></li>
            </ul>
            <button class="md:hidden text-blue-800 focus:outline-none" id="navbar-button">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <ul id="mobile-menu" class="md:hidden bg-gray-800 p-4 space-y-4 hidden">
            <li><a href="{{ route('dashboard.index', ['#home']) }}" class="text-white hover:underline">Dashboard</a>
            </li>
            <li><a href="{{ route('products.index') }}" class="text-white hover:underline">Products</a>
            </li>
            <li><a href="https://wa.me/{{ $options->where('key', 'whatsapp')->first()?->value }}"
                    class="text-white hover:underline">Hubungi Kami</a></li>
            <div @class([
                'relative',
                'md:flex',
                'items-center',
                'hidden' => request()->routeIs('products.index'),
            ])>
                <form class="relative flex items-center" action="{{ route('products.index') }}" method="GET">
                    <input type="text" id="search" name="search"
                        class="w-64 py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Cari produk...">
                    <button type="submit"
                        class="ml-1 right-2 top-2 text-white flex items-center justify-center w-10 h-10 bg-blue-500 rounded-md hover:bg-blue-600 transition">
                        <i class="fas fa-search text-lg"></i>
                    </button>
                </form>
            </div>
        </ul>
    </nav>


    @yield('content')

    <footer class="bg-gray-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                <div class="flex flex-col items-start">
                    <h3 class="text-2xl font-bold mb-4">Toko Bunga Kami</h3>
                    <p class="text-lg mb-4">
                        {{ $options->where('key', 'selogan')->first()?->value }}
                    </p>
                </div>

                <div class="flex flex-col items-start">
                    <h3 class="text-xl font-semibold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        @foreach ($options->where('type', 'sosial media') as $item)
                            <a href="{{ $item->key === 'whatsapp' ? "https://wa.me/{$item->value}" : $item->value}}" class="social-icon" data-tooltip="{{ $item->key }}">
                                <i class="fab fa-{{ $item->key }} text-2xl"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col items-start">
                    <h3 class="text-xl font-semibold mb-4">Pusat Informasi</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('pages.show', ['page' => 'tentang-kami']) }}" class="hover:text-blue-400">Tentang Kami</a></li>
                        <li><a href="{{ route('pages.show', ['page' => 'kebijakan-privasi']) }}" class="hover:text-blue-400">Kebijakan Privasi</a></li>
                        <li><a href="{{ route('pages.show', ['page' => 'syarat-ketentuan']) }}" class="hover:text-blue-400">Syarat & Ketentuan</a></li>
                    </ul>
                </div>


                @php $payments = $options->where('key', 'metode pembayaran')->first()?->value; @endphp
                @if ($payments)
                    <div class="flex flex-col items-start">
                        <h3 class="text-xl font-semibold mb-4">Metode Pembayaran</h3>
                        <ul class="space-y-2">
                            @foreach (explode(',', $payments) as $payment)
                                <li><a href="#" class="hover:text-blue-400">{{ $payment }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex flex-col items-start">
                    <h3 class="text-xl font-semibold mb-4">Pemesanan</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('pages.show', ['page' => 'cara-pemesanan']) }}" class="hover:text-blue-400">Cara Pemesanan</a></li>
                        <li><a href="{{ route('pages.show', ['page' => 'pengiriman']) }}" class="hover:text-blue-400">Pengiriman</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-12">
                <h3 class="text-xl font-semibold mb-4 text-center">Lokasi Kami</h3>
                <div id="map" class="w-full h-64 md:h-80 lg:h-96"></div>
            </div>

            <div class="mt-12 border-t border-gray-700 pt-6 text-center">
                <p class="text-sm text-gray-500">
                    © {{ date('Y') }} {{ $options->where('key', 'nama aplikasi')->first()?->value }} with <a class="hover:underline" href="https://fazrilsh.my.id">Fazril</a>. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <div class="social-icon fixed bottom-6 right-6 flex items-center justify-center space-x-2 rounded-full shadow-lg z-[999]"
        data-tooltip="Hubungi kami melalui whatsapp">
        <a href="https://wa.me/{{ $options->where('key', 'whatsapp')->first()?->value }}" target="_blank"
            class="bg-green-500 w-16 h-16 rounded-full shadow-xl hover:bg-green-600 flex items-center justify-center">
            <i class="fab fa-whatsapp text-white text-2xl"></i>
        </a>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([{{ $options->where('key', 'map koordinat')->first()?->value }}], 20);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([{{ $options->where('key', 'map koordinat')->first()?->value }}]).addTo(map)
            .bindPopup("{{ $options->where('key', 'nama aplikasi')->first()?->value }} | Klik peta untuk membuka di google maps")
            .openPopup();

        map.on('click', function(e) {
            var googleMapsUrl = 'https://www.google.com/maps?q={{ $options->where('key', 'map name')->first()?->value }}';
            window.open(googleMapsUrl, '_blank');
        });
    </script>

    <script>
        const hamburgerBtn = document.getElementById('navbar-button');
        const mobileMenu = document.getElementById('mobile-menu');

        hamburgerBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.remove('navbar-blur');
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.add('navbar-blur');
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>

    @stack('scripts')

    @if (env('APP_ENV') === 'production')
        <script src="{{ asset('public/build/assets/app2.js') }}"></script>
    @endif
</body>

</html>
