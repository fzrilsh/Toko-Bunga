@extends('components.layouts.app')

@push('styling')
    <style>
        .image-display {
            transform: perspective(1000px) rotateY(25deg) scale(0.8) rotateX(10deg);
            transition: 0.6s ease all;
            border-radius: 2rem;
            /* background: url(attr(src)); */
            background-size: contain;
            background-repeat: no-repeat;

            &:hover {
                transform: perspective(1000px) rotateY(-15deg) translateY(-50px) rotateX(10deg) scale(1);
                filter: blur(0);
                opacity: 1;
            }
        }
    </style>
@endpush

@section('content')
    <section class="mx-auto px-10 py-8 grid grid-cols-3 max-md:grid-cols-1 gap-5 items-start">
        <div class="w-full col-span-2 max-md:col-span-1">
            <div class="flex items-start gap-5 mb-10 max-md:flex-col">
                <div class="w-full h-96 mt-8">
                    <img src="{{ asset('storage/' . ($selectedType ? $selectedType->image : $product->image)) }}" alt="{{ $product->name }}" class="image-display flex-none w-96 h-96 object-contain object-center rounded-lg" />
                </div>

                <div class="max-sm:w-full h-auto">
                    <h1 class="text-3xl font-bold text-gray-700 max-w-96 break-words">{{ $product->name }}</h1>

                    <span class="text-xs opacity-55 mb-4"><i class="fas fa-eye"></i> {{ $product->viewers }} orang melihat</span>

                    @if ($product['discount']['discounted'])
                        <p class="font-semibold text-bridal-heath-600 mb-4 flex items-center gap-2">
                            <span class="line-through text-gray-600 text-base">{{ 'Rp ' . number_format($product['price'], 0, ',', '.') }}</span>
                            <span class="uppercase bg-bridal-heath-400 text-white px-2 font-semibold py-1 rounded">Diskon {{ $product['discount']['percent'] }}</span>
                        </p>

                        <p class="text-gray-700 font-bold mb-5">Rp <span class="text-gray-800 text-4xl">{{ number_format($product['discount']['price_after_discount'], 0, ',', '.') }}</span></p>
                    @else
                        <p class="text-gray-700 font-bold mb-5">Rp <span class="text-gray-800 text-4xl">{{ number_format($product['price'], 0, ',', '.') }}</span></p>
                    @endif

                    <p class="text-gray-700 mb-6 max-sm:w-full min-w-32 max-w-96 break-words">
                        {!! nl2br($product->description) !!}
                    </p>
                </div>
            </div>

            @if (count($product->filteredType) > 0)
                <div class="relative">
                    <button onclick="scrollType(-100)" class="absolute left-0 z-10 bg-white hover:bg-gray-300 p-2 rounded-full shadow-md -translate-y-1/2 top-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g>
                                <path d="M12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.009,8.009,0,0,1,12,20Z"/>
                                <polygon points="13.293 7.293 8.586 12 13.293 16.707 14.707 15.293 11.414 12 14.707 8.707 13.293 7.293"/>
                            </g>
                        </svg>                          
                    </button>
                
                    <div class="snap-x snap-mandatory scroll overflow-x-auto overflow-y-hidden flex gap-5 items-start" id="scroll-container">
                        @foreach ($product->filteredType as $type)
                            <a href="{{ route('products.show', [$product, (isset($type['discount']) ? '' : 'type=' . $type['id'])]) }}" title="Tipe" class="snap-center p-3 rounded-3xl flex flex-col items-center justify-center w-40 h-40 flex-none border border-transparent hover:border-bridal-heath-700 hover:scale-95 transition-all {{ $selectedType?->id === $type['id'] ? 'border-bridal-heath-700' : '' }}">
                                <img src="{{ asset('storage/' . $type['image']) }}" alt="{{ $type['name'] }}" class="object-cover object-center rounded-lg w-full h-36" />
                            </a>
                        @endforeach
                    </div>
                
                    <button onclick="scrollType(100)" class="absolute right-0 z-10 bg-white hover:bg-gray-300 p-2 rounded-full shadow-md -translate-y-1/2 top-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g>
                              <path d="M12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.009,8.009,0,0,1,12,20Z"/>
                              <polygon points="9.293 8.707 12.586 12 9.293 15.293 10.707 16.707 15.414 12 10.707 7.293 9.293 8.707"/>
                            </g>
                        </svg>
                    </button>
                </div>
            @endif
        </div>

        <div class="w-full p-4 border border-gray-500 rounded-lg flex flex-col gap-2">
            <p class="text-gray-700 font-bold font-titillium">Atur jumlah</p>
            <div class="relative flex items-center max-w-[8rem] pt-5">
                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-bridal-heath-100 hover:bg-bridal-heath-200 border border-bridal-heath-300 rounded-s-lg p-3 h-11 focus:ring-bridal-heath-100 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-bridal-heath-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                    </svg>
                </button>
                <input
                    type="text"
                    id="quantity-input"
                    name="quantity"
                    data-input-counter
                    value="1"
                    aria-describedby="helper-text-explanation"
                    class="bg-bridal-heath-50 border-x-0 border-bridal-heath-300 h-11 text-center text-bridal-heath-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"
                    min="1"
                    placeholder="1"
                    required
                />
                <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-bridal-heath-100 hover:bg-bridal-heath-200 border border-bridal-heath-300 rounded-e-lg p-3 h-11 focus:ring-bridal-heath-100 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-bridal-heath-900 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </button>
            </div>
            <p class="text-gray-700 font-titillium pt-5">Stok : <span class="font-bold">Tersedia</span></p>
            <div class="flex items-start justify-between pt-5">
                <p class="text-gray-500">Subtotal</p>
                <p id="total" class="text-2xl font-bold text-gray-700 font-titillium">Rp. 80.000</p>
            </div>

            <a
                role="button"
                href="https://wa.me/{{ $options->where('key', 'whatsapp')->first()?->value }}?text=Halo%20{{ $nama_aplikasi }}%2C%0A%0ASaya%20tertarik%20dengan%20produk%20kamu%3A%20{{ route('products.show', $product) }}.%0A%0AApakah%20produk%20tersebut%20masih%20tersedia%3F%20Kalau%20ada%2C%20saya%20ingin%20tahu%20lebih%20lanjut%20ya%21%0A%0ATerima%20kasih%20sebelumnya.%20%F0%9F%98%8A"
                class="bg-bridal-heath-500 hover:bg-bridal-heath-600 text-white text-center font-semibold mt-5 py-2 px-6 rounded-lg"
            >
                Pesan Sekarang
            </a>
        </div>
    </section>

    <section class="px-10 mb-10 container mx-auto mt-10">
        <div class="flex flex-col items-start">
            <p class="text-left mb-2 text-bridal-heath-700 font-dancing text-3xl">Produk Lainnya</p>
        </div>

        <div class="snap-x snap-mandatory scroll overflow-x-auto overflow-y-hidden flex gap-5 mx-auto mt-5 items-start">
            @foreach ($products as $item)
                <div class="snap-center p-3 bg-white rounded-lg flex flex-col items-center justify-center max-sm:w-full w-72 flex-none py-4">
                    <img src="{{ asset('storage/' . $item->image) }}" class="object-contain object-center rounded-lg w-full h-52 mb-4" alt="Product" />
                    <div class="flex flex-col items-center">
                        <p class="max-w-56 mx-auto text-center mb-2 text-xl font-bold break-words">{{ $item->name }}</p>
                        <span class="mx-auto text-xs opacity-55"><i class="fas fa-eye"></i> {{ $item->viewers }} orang melihat</span>
                    </div>

                    <div class="my-4 text-center text-sm">
                        @if ($item['discount']['discounted'])
                            <p class="text-gray-500 mb-2 text-base"><del>Rp {{ number_format($item['price'], 0, ',', '.') }}</del> <span class="uppercase bg-bridal-heath-400 text-white px-2 font-semibold py-1 rounded">Diskon {{ $item['discount']['percent'] }}</span></p>
                        @endif
                        <p class="text-gray-700 font-bold">Rp <span class="text-gray-800 text-4xl">{{ number_format($item['discount']['discounted'] ? $item['discount']['price_after_discount'] : $item['price'], 0, ',', '.') }}</span></p>
                    </div>

                    <a href="{{ route('products.show', $item) }}" class="bg-bridal-heath-700 hover:bg-bridal-heath-900 text-white px-4 py-2 rounded-lg">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        let quantity = document.querySelector('#quantity-input')
        let totalEl = document.querySelector('#total')
        setInterval(() => {
            let q = parseInt(quantity.value) || 1
            let price = {{ $product['discount']['price_after_discount'] ?? $product['price'] }}
            let total = (q * price).toLocaleString('id-ID', { minimumFractionDigits: 0 })
            totalEl.innerHTML = `Rp. ${total}`
        }, 100);
    </script>

    <script>
        const scrollContainer = document.getElementById('scroll-container');

        function scrollType(value) {
            scrollContainer.scrollBy({
                left: value,
                behavior: 'smooth'
            });
        }
    </script>
@endpush