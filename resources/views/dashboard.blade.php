@extends('components.layouts.app')

@section('content')
    <section id="home" class="relative h-[56vh]">
        <div class="absolute inset-0">
            <img src="https://costafarms.com/cdn/shop/articles/Delphinium-Costa-Farms-Perennial-Hero.jpg?v=1680798904"
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
                <h2 class="text-3xl font-bold text-blue-600">Tentang {{ $options->where('key', 'nama aplikasi')->first()?->value }}</h2>
                <p class="mt-4 text-lg md:text-xl text-gray-700">
                    {{ $options->where('key', 'latar belakang')->first()?->value }}
                </p>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0">
                <img src="https://via.placeholder.com/500x400?text=Bunga" alt="Gambar Bunga"
                    class="w-full h-auto object-cover rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <section id="why" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-blue-600">Kenapa Memilih Kami?</h2>
            <p class="mt-4 text-lg md:text-xl text-gray-700">
                Berikut adalah beberapa alasan mengapa kami menjadi pilihan utama dalam menyediakan bunga untuk Anda.
            </p>
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                    <div class="mb-4 text-blue-600 text-4xl">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Pilihan Bunga Berkualitas</h3>
                    <p class="mt-2 text-gray-600">
                        Kami hanya menyediakan bunga segar dan berkualitas tinggi, yang dipilih dengan cermat untuk
                        setiap rangkaian.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                    <div class="mb-4 text-blue-600 text-4xl">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Pengiriman Tepat Waktu</h3>
                    <p class="mt-2 text-gray-600">
                        Layanan pengiriman kami cepat dan tepat waktu, memastikan bunga Anda tiba dalam kondisi segar
                        dan on-time.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                    <div class="mb-4 text-blue-600 text-4xl">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Pelayanan Pelanggan Terbaik</h3>
                    <p class="mt-2 text-gray-600">
                        Tim kami siap membantu Anda 24/7 dengan pelayanan yang ramah dan profesional, untuk pengalaman
                        berbelanja yang menyenangkan.
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
                    <img src="https://via.placeholder.com/100?text=Bunga" alt="Bunga segar" class="rounded-full">
                </div>
                <h3 class="text-xl font-semibold mt-4 text-blue-600">Rangkaian Bunga</h3>
                <p class="mt-2 text-gray-600">
                    Kami menyediakan rangkaian bunga untuk berbagai acara, seperti ulang tahun, pernikahan, dan lainnya.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <div class="flex justify-center">
                    <img src="https://via.placeholder.com/100?text=Dekorasi" alt="Dekorasi" class="rounded-full">
                </div>
                <h3 class="text-xl font-semibold mt-4 text-blue-600">Dekorasi</h3>
                <p class="mt-2 text-gray-600">
                    Layanan dekorasi bunga untuk acara spesial Anda, menciptakan suasana yang memukau.
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <div class="flex justify-center">
                    <img src="https://via.placeholder.com/100?text=Pengiriman" alt="Pengiriman" class="rounded-full">
                </div>
                <h3 class="text-xl font-semibold mt-4 text-blue-600">Pengiriman</h3>
                <p class="mt-2 text-gray-600">
                    Pengiriman cepat dan aman langsung ke lokasi pilihan Anda.
                </p>
            </div>
        </div>
    </section>

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
                                class="product-card flex-none w-64 relative transform transition duration-300 hover:shadow-xl hover:px-2">
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
                                            class="text-xl font-semibold text-blue-600">{{ 'Rp ' . number_format($item['discount']['price_after_discount'], 0, ',', '.') }}</span>
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
                                    class="product-card flex-none w-64 relative transform transition duration-300 hover:shadow-xl hover:px-2">
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
                                                class="text-xl font-semibold text-blue-600">{{ 'Rp ' . number_format($item['discount']['price_after_discount'], 0, ',', '.') }}</span>
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
@endsection
