@extends('components.layouts.app')

@section('content')
    <section id="home" class="relative h-[56vh]">
        <div class="absolute inset-0">
            <img src="{{ asset('public/imgs/hero.jpg') }}"
                alt="Hero Image" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        </div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white py-20">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-6xl font-bold">Selamat Datang di {{ $options->where('key', 'nama aplikasi')->first()?->value }}</h1>
                <p class="mt-4 text-lg md:text-xl">
                    {{ $options->where('key', 'selogan')->first()?->value }}
                </p>
                <button
                    class="mt-6 bg-white text-blue-600 px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-gray-200">
                    <a href="#products">Jelajahi Sekarang</a>
                </button>
            </div>
        </div>
    </section>

    <section id="background-section" class="py-20 bg-blue-100">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl font-bold text-blue-600">Tentang Kami</h2>
                <p class="mt-4 text-lg md:text-xl text-gray-700">
                    {{ $options->where('key', 'latar belakang')->first()?->value }}
                </p>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0">
                <img src="{{ asset('public/imgs/hero-small.jpg') }}" alt="Gambar Bunga"
                    class="w-full h-auto object-cover rounded-lg shadow-lg brightness-90">
            </div>
        </div>
    </section>

    <section id="why" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-blue-600">Mengapa Memilih Akema Agung Florist?</h2>
            <p class="mt-4 text-lg md:text-xl text-gray-700">
                Berikut adalah beberapa alasan mengapa kami menjadi pilihan utama dalam menyediakan bunga untuk Kamu.
            </p>
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                    <div class="mb-4 text-blue-600 text-4xl">
                        <i class="fas fa-smile"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Kepuasan Pelanggan</h3>
                    <p class="mt-2 text-gray-600">
                        Kami mengutamakan kepuasan pelanggan dengan memberikan pelayanan terbaik di setiap kesempatan.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                    <div class="mb-4 text-blue-600 text-4xl">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Rangkaian Bunga Unik</h3>
                    <p class="mt-2 text-gray-600">
                        Setiap rangkaian bunga dibuat dengan cinta dan perhatian pada detail, menciptakan keindahan yang sempurna.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                    <div class="mb-4 text-blue-600 text-4xl">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Harga Kompetitif</h3>
                    <p class="mt-2 text-gray-600">
                        Harga kompetitif dengan kualitas yang tidak tertandingi, memberikan nilai terbaik bagi pelanggan.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                    <div class="mb-4 text-blue-600 text-4xl">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Pilihan Bunga Lokal</h3>
                    <p class="mt-2 text-gray-600">
                        Tersedia berbagai pilihan bunga lokal segar yang memenuhi kebutuhan setiap pelanggan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center text-blue-600">Layanan Kami</h2>
        <p class="text-center text-gray-600 mt-2">
            Kami menawarkan berbagai layanan untuk memenuhi kebutuhan Anda.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <div class="flex justify-center">
                    <div class="text-blue-600 text-6xl" style="font-size: 3rem;">
                        <i class="fas fa-spa"></i>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mt-4 text-blue-600">Rangkaian Bunga</h3>
                <p class="mt-2 text-gray-600">
                    Kami menyediakan produk rangkaian bunga untuk mengungkapkan pesan/ucapan dalam berbagai acara, seperti ulang tahun, pernikahan, graduation, congratulation, duka cita, dan lainnya.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <div class="flex justify-center">
                    <div class="text-blue-600 text-6xl" style="font-size: 3rem;">
                        <i class="fas fa-gem"></i>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mt-4 text-blue-600">Produk Berkualitas</h3>
                <p class="mt-2 text-gray-600">
                    Untuk menciptakan produk, kami menggunakan bahan-bahan berkualitas tinggi agar tidak mengecewakan konsumen kami.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <div class="flex justify-center">
                    <div class="text-blue-600 text-6xl" style="font-size: 3rem;">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mt-4 text-blue-600">Pengiriman</h3>
                <p class="mt-2 text-gray-600">
                    Kami menggunakan layanan pengiriman cepat, aman, dan tepat waktu untuk sampai di lokasi pilihan Anda.
                </p>
            </div>
        </div>
    </section>

    @if ($byCategory->count())
        <section id="products" class="py-16 bg-blue-50">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold text-blue-600 mb-8">Produk Kami</h2>
                <p class="text-right mb-2">
                    <a href="{{ route('products.index') }}" class="hover:underline text-blue-500">Lihat semua</a>
                </p>
                <div class="space-y-8">
                    <div class="category bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold text-blue-600 mb-4">Paling Diminati</h3>
                        <div class="overflow-x-auto overflow-y-hidden flex space-x-4">
                            @foreach ($diminati as $item)
                                <div onclick="window.location.href = '{{ route('products.show', $item) }}'"
                                    class="product-card flex-none w-64 relative transform transition duration-300 hover:shadow-xl">
                                    <img src="{{ asset('public/storage/' . $item->image) }}" alt="{{ $item->name }}"
                                        class="w-full h-48 object-contain rounded-lg">
                                    @if ($item['discount']['discounted'])
                                        <div
                                            class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold py-1 px-3 rounded-full">
                                            Diskon {{ $item['discount']['percent'] }}
                                        </div>
                                    @endif
                                    <h4 class="text-lg font-medium text-gray-800 mt-4">{{ $item->name }}</h4>
                                    @if ($item['discount']['discounted'])
                                        <div class="flex items-center justify-center gap-4 mt-2">
                                            <span
                                                class="text-gray-500 line-through">{{ 'Rp ' . number_format($item['price'], 0, ',', '.') }}</span>
                                            <span
                                                class="font-semibold text-blue-600">{{ 'Rp ' . number_format($item['discount']['price_after_discount'], 0, ',', '.') }}</span>
                                        </div>
                                    @else
                                        <p class="text-gray-500 mt-1">
                                            {{ 'Rp ' . number_format($item['price'], 0, ',', '.') }}
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @foreach ($byCategory as $category => $items)
                        <div class="category bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-semibold text-blue-600 mb-4">{{ $category }}</h3>
                            <div class="overflow-x-auto overflow-y-hidden flex space-x-4">
                                @foreach ($items as $item)
                                    <div onclick="window.location.href = '{{ route('products.show', $item) }}'"
                                        class="product-card flex-none w-64 relative transform transition duration-300 hover:shadow-xl">
                                        <img src="{{ asset('public/storage/' . $item->image) }}" alt="{{ $item->name }}"
                                            class="w-full h-48 object-contain rounded-lg">
                                        @if ($item['discount']['discounted'])
                                            <div
                                                class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold py-1 px-3 rounded-full">
                                                Diskon {{ $item['discount']['percent'] }}
                                            </div>
                                        @endif
                                        <h4 class="text-lg font-medium text-gray-800 mt-4">{{ $item->name }}</h4>
                                        @if ($item['discount']['discounted'])
                                            <div class="flex items-center justify-center gap-4 mt-2">
                                                <span
                                                    class="text-gray-500 line-through">{{ 'Rp ' . number_format($item['price'], 0, ',', '.') }}</span>
                                                <span
                                                    class="font-semibold text-blue-600">{{ 'Rp ' . number_format($item['discount']['price_after_discount'], 0, ',', '.') }}</span>
                                            </div>
                                        @else
                                            <p class="text-gray-500 mt-1">
                                                {{ 'Rp ' . number_format($item['price'], 0, ',', '.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
@endsection
