@extends('components.layouts.app')

@section('content')
    <section class="w-full bg-bridal-heath-150 p-10 mb-10">
        <div class="block text-center mb-5">
            <p class="text-center mb-2 text-bridal-heath-700 font-dancing text-2xl">Pencarian</p>
            <h1 class="text-center text-3xl font-bold text-gray-700 font-titillium">Cari Bunga Yang Kamu Butuhkan</h1>
        </div>

        <form class="flex items-center max-w-xl mx-auto" action="{{ route('products.index') }}" method="GET">
            <label for="search" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="text" id="search" name="search" value="{{ $search }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bridal-heath-500 focus:border-bridal-heath-500 block w-full p-2.5" placeholder="Cari produk..." />
            </div>
            <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-bridal-heath-700 rounded-lg border border-bridal-heath-700 hover:bg-bridal-heath-800 focus:ring-4 focus:outline-none focus:ring-bridal-heath-300">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
    </section>

    @forelse ($products as $category => $items)
        <section class="px-10 mb-10 mx-auto mt-10">
            <div class="grid grid-cols-1 gap-5 mx-auto mt-5 items-center">
                @if ($loop->first)
                    <p class="text-left mb-2 text-bridal-heath-700 font-dancing text-lg">Semua Produk Kami</p>
                @endif
                <h1 class="text-left text-3xl font-bold text-gray-700 font-titillium">{{ ucwords($category) }}</h1>
            </div>

            <div class="flex flex-row flex-wrap max-sm:flex-col gap-5  mx-auto mt-5">
                @foreach ($items as $item)
                    <div class="p-3 bg-white rounded-lg flex flex-col items-center justify-center max-sm:w-full w-72 border shadow-lg shadow-bridal-heath py-4">
                        <img src="{{ 'storage/' . $item->image }}" class="object-contain object-center rounded-lg w-full h-52 mb-4" alt="Product" />
                        <div class="flex flex-col items-center">
                            <p class="mx-auto text-center mb-2 text-xl font-bold break-words">{{ $item->name }}</p>
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
        </section>
    @empty
        <section class="flex flex-col items-center mb-10 p-5 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 1920 1080" enable-background="new 0 0 1920 1080" id="ConceptofUnknownthings" class="w-96">
                <g id="Background" fill="#000000" class="color000000 svgShape">
                  <ellipse cx="906.5" cy="1046.6" rx="337.2" ry="33.4" opacity="8.000000e-02" fill="#dba865" class="colorffbe55 svgShape"></ellipse>
                  <path d="M671 1021.7c-1.7-1.6-249.3-347.5-43.9-456 279.5-147.8-92.7-647 423.3-554.3 496.8 89.2-102.4 483.3 101.1 627.3 133.5 94.4 211 321.2-68.2 394-177.1 46-369.2 29.3-412.3-11z" opacity="8.000000e-02" fill="#dba865" class="colorffbe55 svgShape"></path>
                </g>
                <g id="Character" fill="#000000" class="color000000 svgShape">
                  <path d="m1051.1 621.9 7.1-9.9c1.9-3.7 10.6-3.1 13.4-.1 1.9 2.1.3 7.7-.6 9.6-2.2 4.7-13.3 22.9-13.3 22.9s-5.4 2.4-10.1-3.3c-3.3-3.8 2-17.1 3.5-19.2z" fill="#fcdcb1" class="colorfcd2b1 svgShape"></path>
                  <path d="M1069.5 757.9s-3.4-23.8-11.6-47.8c-8.2-24-.2-67.3-.2-67.3s-11.5-6.7-13.3-3.1c-1.8 3.6-15 62.2-15 62.2s-.5 35.5 7.3 46.6c4.7 6.6 24.4 16.2 32.8 9.4z" fill="#f49d2a" class="color2a94f4 svgShape"></path>
                  <path d="M1033.6 1030.6s-1.5 7.9-1.4 14.2c.9 4.4 0 5.7 0 5.7l-18-1.4s8-3.6 7.4-20.7c-.6-17.2 12 2.2 12 2.2z" fill="#fcdcb1" class="colorfcd2b1 svgShape"></path>
                  <path d="M1032.4 1046.1s-7.8 2.7-15.6.7c-9.1 3.9-15.5 5.4-23.8 6.4s-6.8 7.2 7.3 6.4c14.1-.9 24-.3 27.2 0 3.1.3 8.2.7 8.4-1.4.3-2-.9-12.8-3.5-12.1z" fill="#70440b" class="color0b4870 svgShape"></path>
                  <path d="M1027 809.9s-11.6 104.2-12.3 117.8c-.7 13.6-.7 18.3 0 26.6s6.8 77.9 6.8 77.9l11.8.7s8.8-75.9 12.3-88.9c3.4-13 16.9-78.8 16.9-78.8l-15.5-67.3-20 12z" fill="#8c560e" class="color0e538c svgShape"></path>
                  <path d="M1083.2 1032s-.6 5.8 0 12.1c1.2 4.3.5 5.7.5 5.7l-18.1.1s7.6-4.2 5.7-21.3c-2-17.1 11.9 3.4 11.9 3.4z" fill="#fcdcb1" class="colorfcd2b1 svgShape"></path>
                  <path d="M1082.7 1046.1s-7.8 2.7-15.6.7c-9.1 3.9-15.5 5.4-23.8 6.4s-6.8 7.2 7.3 6.4c14.1-.9 24-.3 27.2 0 3.1.3 8.2.7 8.4-1.4.2-2-.9-12.8-3.5-12.1z" fill="#70440b" class="color0b4870 svgShape"></path>
                  <path d="M1050.3 809.9s9.8 104.6 9.1 118.2c-.7 13.6 11.9 104.2 11.9 104.2l11.9.2s3.1-79.6 3.1-93c0-12.8 4.2-116.6 4.2-116.6l-17.5-25-22.7 12z" fill="#8c560e" class="color0e538c svgShape"></path>
                  <path d="M1043.5 737.4s53.2 3.7 56.6 15.7c3.4 12-1.1 101.3-1.1 101.3s-52.3 14.6-77.5-9.7c1.8-8.6 9.5-93.8 22-107.3z" fill="#f49d2a" class="color2a94f4 svgShape"></path>
                  <path d="m1062.6 728-5 18.8s1.7 8.5 11.1 7.7c9.4-.8 10.4-6.3 10.4-6.3l-3.7-21.3c.1 0-9-1.6-12.8 1.1z" fill="#fcdcb1" class="colorfcd2b1 svgShape"></path>
                  <path d="M1056.7 698.6s-11.8 17.8-9.6 24c2.2 6.2 10.4 11.3 28.6 11.5 6.1-1.5 11.1-20.6 10.5-24.5-3.6-25.1-23.3-15.9-29.5-11z" fill="#ffe8ca" class="colorffe3ca svgShape"></path>
                  <path d="M1053.5 700.3c6.4 6 9.8 4.9 18.2 4.6 5.1-.2 7.2 3.9 5.9 6.5-1.3 2.6-6.9 8-2.8 8.4 4.2.4 3.9-6.2 6.8-3.4 2.9 2.9-3.4 10.5-.3 12.1 3.1 1.6 13.8-1.7 11.2-8.9-2.5-7.2 20-26.8-17-37.8-9.5-2.8-12.9-1.8-16-2-7.2-.5-6.9 19.7-6 20.5z" fill="#70440b" class="color0b4870 svgShape"></path>
                </g>
                <g id="Object" fill="#000000" class="color000000 svgShape">
                  <path d="M837.2 724.7c0-65.4 7.4-116.9 22.2-154.8 14.8-37.8 38.7-70.6 71.9-98.4 33.1-27.8 58.3-53.2 75.5-76.2 17.2-23.1 25.9-48.5 25.9-76.2 0-67.6-29.1-101.4-87.3-101.4-26.9 0-48.6 9.9-65.1 29.5-16.6 19.7-25.3 46.3-26.2 79.9H627c.9-89.5 29.1-159.2 84.6-209.2C767.1 68 831.1 39.7 931.4 39.7c99.8 0 191 26.4 245.9 72.5 54.8 46.1 82.3 111.7 82.3 196.7 0 37.2-7.4 71-22.2 101.4-14.8 30.4-38.5 61.6-71.2 93.3l-77.2 71.9c-21.9 21-37.2 42.6-45.7 64.8-8.5 22.2-13.2 50.3-14.1 84.3h-192zm-27.5 204.2c0-33.1 30.9-87 54.9-108.3 0 0 31.4-8.5 67.3-8.5 35.8 0 69.1 13.9 93 35.2 23.9 21.3 35.9 48.5 35.9 81.6 0 33.1-12 60.3-35.9 81.6-24 21.3-53.8 31.9-89.6 31.9s-65.7-10.6-89.6-31.9c-24-21.3-36-48.5-36-81.6z" fill="#dba865" opacity=".2" class="colorffbe55 svgShape"></path>
                  <path d="M807.1 724.7c0-65.4 7.4-116.9 22.2-154.8 14.8-37.8 38.7-70.6 71.9-98.4 33.1-27.8 58.3-53.2 75.5-76.2 17.2-23.1 25.9-48.5 25.9-76.2 0-67.6-29.1-101.4-87.3-101.4-26.9 0-48.6 9.9-65.1 29.5-16.6 19.7-25.3 46.3-26.2 79.9H597c.8-89.4 29-159.1 84.5-209.1C737 68.1 814.9 43.2 915.2 43.2c99.8 0 177.2 23.1 232 69.2 54.8 46.1 82.3 111.7 82.3 196.7 0 37.2-7.4 71-22.2 101.4-14.8 30.4-38.5 61.6-71.2 93.3l-77.2 71.9c-21.9 21-37.2 42.6-45.7 64.8-8.5 22.2-13.2 50.3-14.1 84.3h-192zm-27.6 204.2c0-33.1 12-60.3 35.9-81.6 23.9-21.3 53.8-31.9 89.6-31.9s65.7 10.6 89.6 31.9c23.9 21.3 35.9 48.5 35.9 81.6 0 33.1-12 60.3-35.9 81.6-24 21.3-53.8 31.9-89.6 31.9s-65.7-10.6-89.6-31.9c-23.9-21.3-35.9-48.5-35.9-81.6z" fill="#dba865" class="colorffbe55 svgShape"></path>
                  <path d="M1103.1 879.2s-8.8 3-11 19.9c-.2 1.5 2.6 1.3 2.9-.2l4.6-9.4c1.1 2.7-.7 3-1.3 5.7l-2.1 6.9c-.8 2.7 1.6 5.2 4.3 4.5 2.5-.7 5.2-1.6 6.3-2.8 2.4-2.6 8.3-17.9 6.4-21.7-1.9-3.7-6-6.4-10.1-2.9z" fill="#fcdcb1" class="colorfcd2b1 svgShape"></path>
                  <path d="M1084.5 750.9c5.3-6.4 15.5-5.6 20.1 1.4 8 12.1 22.9 36.9 22.8 52.7.7 18.3-14.2 77.3-14.2 77.3s-6.9 0-10.1-3c.2-4.8 2.3-61.1 2.3-61.1s-20.5-30.3-25-44.3c-2.8-8.8-.5-17.4 4.1-23z" fill="#f49d2a" class="color2a94f4 svgShape"></path>
                  <path d="M685.9 677.2s-.5-17 5.5-24.1c7.8-9.3 27.5-10.2 36.2-3.9 9.7 7 16.4 23.5 11.5 36.8 14.8 5.8 31 13.1 24.8 52.5-12.6 79.4-112.4 45.3-89.6-24.9 5.1-15.4 11.6-36.4 11.6-36.4z" fill="#70440b" class="color0b4870 svgShape"></path>
                  <path d="M740.2 1011.2s1.4 7.4 1.3 13.2c-.8 4.1 0 5.3 0 5.3l16.7-1.3s-7.4-3.3-6.9-19.3c.6-15.9-11.1 2.1-11.1 2.1z" fill="#b98f59" class="colorb97a59 svgShape"></path>
                  <path d="M741.3 1025.7s7.3 2.5 14.5.6c8.5 3.6 14.4 5 22.1 5.9 7.7.9 6.3 6.7-6.8 5.9-13.1-.8-22.3-.3-25.2 0-2.9.3-7.6.6-7.8-1.3-.2-1.8.8-11.7 3.2-11.1zM746.4 806.4s10.8 96.8 11.4 109.4c.6 12.6.6 17 0 24.7-.6 7.7-6.4 72.3-6.4 72.3l-11 .6s-8.2-70.5-11.4-82.5c-3.2-12.1-15.7-73.1-15.7-73.1l14.4-62.5 18.7 11.1z" fill="#70440b" class="color0b4870 svgShape"></path>
                  <path d="M694.2 1012.6s.6 5.4 0 11.2c-1.1 4-.4 5.2-.4 5.2l16.8.1s-7.1-3.9-5.3-19.8c1.8-15.8-11.1 3.3-11.1 3.3z" fill="#b98f59" class="colorb97a59 svgShape"></path>
                  <path d="M694.6 1025.7s7.3 2.5 14.5.6c8.5 3.6 14.4 5 22.1 5.9 7.7.9 6.3 6.7-6.8 5.9-13.1-.8-22.3-.3-25.2 0-2.9.3-7.6.6-7.8-1.3-.2-1.8.9-11.7 3.2-11.1zM724.7 806.4s-9.1 97.1-8.5 109.7c.6 12.6-11 96.8-11 96.8l-11 .2s-2.8-73.9-2.8-86.4c0-11.8-3.9-108.3-3.9-108.3l16.3-23.2 20.9 11.2z" fill="#70440b" class="color0b4870 svgShape"></path>
                  <path d="M759.1 669s-7.5-6.4-8.8-8.6c-3.7-5.7-9.7-7-13.6-7.2-2-.1-3.6 1.5-3.6 3.4 0 .5.3 1 .7 1.3l9.8 4.7c.5.2.5.3.9.7l.4.8c.7.9.6 1.3-.6 1.5l-1.3-.1c-.6.1-5.1-1.6-5.6-1.9-.8-.4-1.8.3-1.7 1.2 0 .7.4 1.4 1.1 1.7l7.6 4.8 6.2 2.2c13.8 11 25.5 19.1 26.9 22.5-14.4 10.3-42.5 22.8-42.5 22.8l11.6 13.1s35.3-18.7 43.6-25.5c17.5-16.7-16.9-31-31.1-37.4z" fill="#b98f59" class="colorb97a59 svgShape"></path>
                  <path d="M736.2 749.9c-1.5 3.5 9.9 52.1 11.8 63.3 0 0-.2 0-.7-.1-5-.7-35.4-4.8-59.9 5.5l-2.2-68.6-.1-2.5s0-2.6.2-6.6c.6-8.2 2.2-21.9 7.5-30.8 2.7-4.6 6.3-7.9 11.2-8.3 15.3-1.5 27.4 5.1 33.2 6.9 9.6 3 15.3 1.2 15.3 1.2s7.6 18.9 3.8 22.3l-16 6.7c.2-.2-2.6 7.4-4.1 11z" fill="#dba865" class="colorffbe55 svgShape"></path>
                  <path d="M732.2 658.1s9.7 22.5 2.4 32.7c-5.5 7.7-15.1 7.9-15.1 7.9v11.1s-1.1 1-3 1.1c-3.4.2-12.3-5.2-12.3-5.2v-43.6l28-4zM683.5 745.1s7.7 39.1 11.1 49c1.8 7.9 52.2 10.2 55.4 10.8 6.1 5.4 9.5 5.2 11.5 5.2 1.5 0 .8.3 8.8.8 3.6.2 6-3.5 4.3-6.7-4.2-4.1-3.9-2.6-9.6-3.8-6.1-1.2-7.6-1.9-6.6-3 6.1-6.8.6-8.2-5.5-1.2-.4.4-1.1.1-1.7.1-11.7-2.8-39.3-10.6-43.1-10.7-4.4-16.6-5.6-46.1-5.6-46.1l-19 5.6z" fill="#b98f59" class="colorb97a59 svgShape"></path>
                  <path d="M680.5 751.9s-3.3-32.2 6.2-39.9c9.5-7.7 20.3 4.7 19.8 21-.5 16.2-.2 22.1-.2 22.1s-14.6 4.9-25.8-3.2z" fill="#dba865" class="colorffbe55 svgShape"></path>
                  <path d="M733.1 655.6s-5 29-17.1 23.8c-11-4.7-5.5-.2-15.6 9.5-3 2.9-.6-30.7-.6-30.7l33.3-2.6z" fill="#70440b" class="color0b4870 svgShape"></path>
                </g>
            </svg>
              
            <p class="text-2xl font-semibold text-gray-800 mt-4">Yah, Produk tidak ditemukan!</p>
            <p class="text-gray-600 mt-2">
                Coba sesuaikan pencarian atau coba lagi lain waktu ya!
            </p>
            <div class="mt-6">
                <a href="{{ route('dashboard.index') }}" 
                    class="bg-[#E8D5C0] text-black font-bold py-2 px-6 rounded shadow-md transition">
                    Balik ke Beranda
                </a>
            </div>
        </section>
    @endforelse
@endsection
