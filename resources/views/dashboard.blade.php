@extends('components.layouts.app')

@section('content')
    <section class="filter h-screen w-full object-cover bg-cover flex justify-center items-center mb-10" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('imgs/welcome.jpeg') }}'); background-position: 100% 0%; background-repeat: no-repeat;">
        <div class="p-5 border border-white max-w-3xl w-full rounded-lg flex items-center justify-center flex-col max-sm:max-w-sm">
            <h1 class="text-white text-5xl font-bold mb-5 text-center font-titillium">Rasakan Keanggunan Bunga Segar</h1>
            <p class="text-white text-2xl font-lora font-medium mb-5 text-center">{{ $options->where('key', 'selogan')->first()?->value }}</p>

            <div class="flex justify-between items-center gap-2">
                <a href="{{ route('products.index') }}" class="text-white bg-bridal-heath-700 hover:bg-bridal-heath-900 rounded-lg px-5 py-2 flex items-center">Jelajahi Sekarang</a>
                <a href="https://wa.me/{{ $options->where('key', 'whatsapp')->first()?->value }}" class="text-white bg-transparent border border-white rounded-lg px-5 py-2 flex items-center gap-2">Hubungi Kami <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <section class="relative w-full flex justify-center items-center overflow-hidden">
        <div class="z-10 absolute left-0 top-0 animate-left">
            <img src="{{ asset('imgs/scroll_flower.png') }}" alt="Scroll Flower" width="500" />
        </div>

        <div class="w-full z-20 px-10">
            <div class="max-w-xl mx-auto">
                <p class="text-center mb-2 text-bridal-heath-700 font-dancing text-lg">Damai Agung Florist Showcase</p>
                <h1 class="text-center text-3xl font-bold text-gray-700 font-titillium">Rekomendasi Bunga Khusus Untukmu</h1>
            </div>

            <div class="scroll overflow-x-auto overflow-y-hidden gap-5 flex justify-around mx-auto mt-5 items-end max-w-4xl max-sm:w-full max-sm:max-w-none">
                @foreach ($diminati as $item)
                    <div class="p-3 bg-white rounded-lg flex flex-col items-center justify-center w-64 max-sm:w-full flex-none">
                        <img src="{{ 'storage/' . $item->image }}" class="object-contain object-center rounded-lg w-full h-52 mb-4" alt="Product" />
                        <div class="flex flex-col items-center">
                            <p class="mx-auto text-center mb-2 text-xl font-bold">{{ $item->name }}</p>
                            <span class="mx-auto text-xs opacity-55"><i class="fas fa-eye"></i> {{ $item->viewers }} orang melihat</span>
                        </div>

                        <div class="my-4 text-center text-sm">
                            @if ($item['discount']['discounted'])
                                <p class="text-gray-500 mb-2 text-base"><del>{{ 'Rp ' . number_format($item['price'], 0, ',', '.') }}</del> <span class="uppercase bg-bridal-heath-400 text-white px-2 font-semibold py-1 rounded">Diskon {{ $item['discount']['percent'] }}</span></p>
                            @endif
                            <p class="text-gray-700 font-bold">Rp <span class="text-gray-800 text-4xl">{{ number_format($item['discount']['price_after_discount'], 0, ',', '.') }}</span></p>
                        </div>

                        <a href="{{ route('products.show', $item) }}" class="bg-bridal-heath-700 hover:bg-bridal-heath-900 text-white px-4 py-2 rounded-lg">Lihat Semua</a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="z-10 absolute right-0 top-0 animate-right max-sm:">
            <img src="{{ asset('imgs/scroll_flower_right.png') }}" alt="Scroll Flower" width="500" />
        </div>
    </section>

    <section class="bg-bridal-heath-200 w-full p-10 my-10 grid grid-cols-2 max-sm:grid-cols-1 items-center" id="tentang-kami">
        <div class="mx-auto">
            <div class="flex flex-col items-start mb-5">
                <p class="text-left mb-2 text-bridal-heath-700 font-dancing text-lg">Tentang Kami</p>
                <h1 class="text-left text-3xl font-bold text-gray-700 font-titillium">Inilah bagaimana kamu mengenal kami</h1>
            </div>

            <p class="text-left text-gray-600 font-normal">{{ $options->where('key', 'latar belakang')->first()?->value }}</p>
        </div>

        <div class="flex">
            <img src="{{ asset('imgs/flower_about.png') }}" class="w-80mx-auto" alt="Flowers" />
        </div>
    </section>

    <section class="p-10 my-10 border-b border-bridal-heath-400" id="layanan-kami">
        <div class="flex flex-col items-center mb-5">
            <h1 class="text-center text-3xl font-bold text-gray-700 font-titillium">Layanan Kami</h1>
            <p class="text-center mb-2 text-bridal-heath-700 font-dancing text-lg">Kami menawarkan berbagai layanan untuk memenuhi kebutuhan Anda.</p>
        </div>

        <div class="grid grid-cols-3 max-sm:grid-cols-1 w-full gap-5">
            <div class="flex flex-col items-start gap-5 justify-start border border-transparent hover:border-bridal-heath-700 hover:scale-95 transition-all rounded-lg bg-white p-5">
                <i class="fa-solid fa-spa text-bridal-heath-700 text-5xl"></i>
                <p class="text-center font-bold text-2xl mb-2 font-titillium">Rangkaian Bunga</p>
                <p class="text-gray-600 font-normal">Kami menyediakan produk rangkaian bunga untuk mengungkapkan pesan/ucapan dalam berbagai acara, seperti ulang tahun, pernikahan, graduation, congratulation, duka cita, dan lainnya.</p>
            </div>

            <div class="flex flex-col items-start gap-5 justify-start border border-transparent hover:border-bridal-heath-700 hover:scale-95 transition-all rounded-lg bg-white p-5">
                <i class="fa-solid fa-gem text-bridal-heath-700 text-5xl"></i>
                <p class="text-center font-bold text-2xl mb-2 font-titillium">Produk Berkualitas</p>
                <p class="text-gray-600 font-normal">Untuk menciptakan produk, kami menggunakan bahan-bahan berkualitas tinggi agar tidak mengecewakan konsumen kami.</p>
            </div>

            <div class="flex flex-col items-start gap-5 justify-start border border-transparent hover:border-bridal-heath-700 hover:scale-95 transition-all rounded-lg bg-white p-5">
                <i class="fa-solid fa-truck-fast text-bridal-heath-700 text-5xl"></i>
                <p class="text-center font-bold text-2xl mb-2 font-titillium">Rangkaian Bunga</p>
                <p class="text-gray-600 font-normal">Kami menggunakan layanan pengiriman cepat, aman, dan tepat waktu untuk sampai di lokasi pilihan Anda.</p>
            </div>
        </div>
    </section>

    <section class="pb-10 flex flex-col items-center gap-5 border-b border-bridal-heath-400">
        <h1 class="container text-center text-4xl max-sm:text-2xl font-bold font-titillium text-gray-700">Toko Bunga di Tangerang - Harga Terjangkau Produk Berkualitas</h1>

        <button id="toggleButton" data-collapse-toggle="show" aria-controls="show" aria-expanded="false" class="mx-auto bg-transparent border border-bridal-heath-700 text-xl px-5 py-2 rounded-lg text-gray-700">Show <i class="fa-solid fa-angle-down"></i></button>

        <div class="hidden justify-between items-center w-full mb-5" id="show">
            <div class="container px-10 mb-10 mx-auto text-center text-gray-700">
                <h1 class="text-xl text-bridal-heath-700 font-dancing"><strong>Toko Bunga, Florist Online, Toko Bunga Terdekat &amp; Murah, Harga Mulai dari Rp 19.000 : Damai Agung Florist</strong></h1>
                <p class="mt-2 text-gray-600">
                    Damai Agung Florist adalah toko bunga di Tangerang yang menyediakan layanan rangkaian bunga segar untuk berbagai kebutuhan Anda. Kami berkomitmen untuk menghadirkan keindahan melalui setiap rangkaian bunga, baik itu untuk momen bahagia seperti ulang tahun, pernikahan,
                    atau perayaan lainnya, hingga momen duka cita. Dengan layanan profesional dan pengiriman yang tepat waktu, Damai Agung Florist siap menjadi pilihan utama Anda untuk segala kebutuhan bunga.
                </p>
                <div class="my-4">
                    <h2 class="text-2xl text-bridal-heath-700 font-dancing"><strong>Keunggulan kami</strong></h2>
                    <ol class="ml-6">
                        <li>
                            <h3 class="font-bold">Bunga Segar Pilihan</h3>
                            <p>Kami bekerja sama dengan petani bunga terbaik untuk memastikan setiap bunga yang Anda terima segar, harum, dan berkualitas tinggi.</p>
                        </li>
                        <li>
                            <h3 class="font-bold">Desain Eksklusif dan Elegan</h3>
                            <p>Tim florist profesional kami merancang setiap rangkaian dengan sentuhan seni yang memikat dan disesuaikan dengan kebutuhan serta keinginan Anda.</p>
                        </li>
                        <li>
                            <h3 class="font-bold">Layanan Personal</h3>
                            <p>Kami siap membantu Anda memilih jenis bunga, warna, dan desain yang sesuai dengan momen spesial Anda.</p>
                        </li>
                        <li>
                            <h3 class="font-bold">Pengiriman Tepat Waktu</h3>
                            <p>Kami memahami pentingnya ketepatan waktu. Oleh karena itu, kami menyediakan layanan pengiriman cepat dan aman ke Tangerang atau seluruh Indonesia.</p>
                        </li>
                    </ol>
                </div>
                <div class="my-4">
                    <h2 class="text-2xl text-bridal-heath-700 font-dancing"><strong>Produk utama kami</strong></h2>
                    <ol class="ml-6">
                        <li>- <strong>Buket bunga</strong>, untuk hadiah ulang tahun, perayaan, atau sekadar kejutan manis.</li>
                        <li>- <strong>Bunga Meja</strong>, cocok untuk dekorasi rumah, kantor, atau acara formal.</li>
                        <li>- <strong>Bunga Standing</strong>, cocok untuk ucapan grand opening suatu toko.</li>
                        <li>- <strong>Karangan Bunga</strong>, cocok untuk menyampaikan ucapan\pesan dalam berbagai suasana melalui karangan bunga.</li>
                    </ol>
                </div>
                <div class="my-4">
                    <h2 class="text-2xl text-bridal-heath-700 font-dancing"><strong>Layanan Pengiriman Kami:</strong></h2>
                    <p>Kami melayani pengiriman bunga ke berbagai wilayah, termasuk tangerang atau seluruh area Jabodetabek. Dengan layanan same-day delivery, bunga Anda akan tiba di hari yang sama, sesuai dengan permintaan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="px-10 pb-10 container mx-auto mt-10">
        <div class="flex flex-col items-center">
            <p class="text-left mb-2 text-bridal-heath-700 font-dancing text-lg">Semua Produk Kami</p>
            <h1 class="text-left text-3xl font-bold text-gray-700 font-titillium">Lihatlah yang kami miliki <a href="{{ route('products.index') }}" class="text-sm text-bridal-heath-700 hover:underline cursor-pointer">(lihat semua)</a></h1>
        </div>

        <div class="scroll overflow-x-auto overflow-y-hidden flex gap-5 mx-auto mt-5 items-center">
            @foreach ($products as $product)
                <div class="mx-auto p-3 bg-white rounded-lg flex flex-col items-center justify-center w-64 flex-none">
                    <img src="{{ asset('storage/' . $product->image) }}" class="object-contain object-center rounded-lg w-full h-52 mb-4" alt="Product" />
                    <div class="flex flex-col items-center">
                        <p class="mx-auto text-center mb-2 text-xl font-bold">{{ $product->name }}</p>
                        <span class="mx-auto text-xs opacity-55"><i class="fas fa-eye"></i> {{ $product->viewers }} orang melihat</span>
                    </div>

                    <div class="my-4 text-center text-sm">
                        @if ($product['discount']['discounted'])
                            <p class="text-gray-500 mb-2 text-base"><del>{{ 'Rp ' . number_format($product['price'], 0, ',', '.') }}</del> <span class="uppercase bg-bridal-heath-400 text-white px-2 font-semibold py-1 rounded">Diskon {{ $product['discount']['percent'] }}</span></p>
                        @endif
                        <p class="text-gray-700 font-bold">Rp <span class="text-gray-800 text-4xl">{{ number_format($product['discount']['price_after_discount'], 0, ',', '.') }}</span></p>
                    </div>

                    <a href="{{ route('products.show', $product) }}" class="bg-bridal-heath-700 hover:bg-bridal-heath-900 text-white px-4 py-2 rounded-lg">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
