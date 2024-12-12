@extends('components.layouts.app')

@section('styling')
    <style>
        .image-display {
            transform: perspective(1000px) rotateY(25deg) scale(0.8) rotateX(10deg);
            transition: 0.6s ease all;
            border-radius: 2rem;
            background: url(attr(src));
            background-size: contain;
            background-repeat: no-repeat;

            &:hover {
                transform: perspective(1000px) rotateY(-15deg) translateY(-50px) rotateX(10deg) scale(1);
                filter: blur(0);
                opacity: 1;
            }
        }
    </style>
@endsection

@section('content')
    <x-breadcrumb />

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <div>
                <img src="{{ asset('public/storage/' . ($selectedType ? $selectedType->image : $product->image)) }}" alt="{{ $product->name }}"
                    class="image-display w-full rounded-lg mb-4 object-contain" onclick="window.location.href = '{{ route('products.show', $product) }}'">

                <div class="grid grid-cols-3 gap-4">
                    @foreach ($product->types as $type)
                        <a href="{{ route('products.show', [$product, 'type=' . $type['id']]) }}" @class(['border', 'rounded-lg', 'p-4', 'text-center', 'hover:shadow-lg', 'cursor-pointer', 'shadow-lg' => $selectedType?->id === $type['id']])>
                            <img src="{{ asset('public/storage/' . $type['image']) }}" alt="{{ $type['name'] }}"
                                class="w-full h-20 object-contain rounded-md mb-2">
                            <p class="text-sm font-medium">{{ $type['name'] }}</p>
                            <p class="text-blue-600 font-semibold">{{ 'Rp ' . number_format($type['price'], 0, ',', '.') }}</p>
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <h1 class="text-3xl font-bold text-blue-800">{{ $product->name }} {{ $selectedType ? "($selectedType->name)" : '' }}</h1>

                <span class="text-xs opacity-55 mb-4"><i class="fas fa-eye"></i> {{ $product->viewers }} orang
                    melihat</span>

                @if($selectedType)
                    <p class="text-2xl font-semibold text-blue-600 mb-4 flex items-end gap-2">
                        {{ 'Rp ' . number_format($selectedType->price, 0, ',', '.') }}
                    </p>
                @else
                <p class="text-2xl font-semibold text-blue-600 mb-4 flex items-end gap-2">
                    @if ($product['discount']['discounted'])
                        <span
                            class="line-through text-gray-400 text-xs">{{ 'Rp ' . number_format($product['price'], 0, ',', '.') }}</span>
                        {{ 'Rp ' . number_format($product['discount']['price_after_discount'], 0, ',', '.') }}
                        <span
                            class="bg-red-500 p-2 rounded-lg text-white text-xl">-{{ $product['discount']['percent'] }}</span>
                    @else
                        {{ 'Rp ' . number_format($product['price'], 0, ',', '.') }}
                    @endif
                </p>
                @endif

                <p class="text-gray-700 mb-6">
                    {{ $product->description }}
                </p>

                @use(\App\Models\Option)
                <a role="button"
                    href="https://wa.me/{{ Option::query()->where('key', 'whatsapp')->first()?->value }}?text=Halo%20{{ config('app.name') }}%2C%0A%0ASaya%20tertarik%20dengan%20produk%20kamu%20ini%3A%20%2A{{ $product->name }}%2A%0ADengan%20Tipe%3A%20%2A{{ $selectedType ? $selectedType->name : 'default' }}%2A%0A%0AApakah%20produk%20tersebut%20masih%20ada%3F"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg">
                    Pesan Sekarang
                </a>
            </div>
        </div>

        <div class="mt-12">
            <h2 class="text-2xl font-bold text-blue-800 mb-4">Produk Lainnya</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($products as $item)
                    <div class="relative bg-white rounded-lg shadow-md p-4 hover:shadow-lg"
                        onclick="window.location.href = '{{ route('products.show', $item) }}'">
                        <img src="{{ asset('public/storage/' . $item->image) }}" alt="Product 1"
                            class="w-full h-40 object-contain rounded-md mb-4">
                        @if ($item['discount']['discounted'])
                            <div
                                class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold py-1 px-3 rounded-full">
                                Diskon {{ $item['discount']['percent'] }}
                            </div>
                        @endif
                        <h3 class="text-lg font-medium text-gray-800 mb-2">{{ $item->name }}</h3>
                        <span class="text-xs opacity-55"><i class="fas fa-eye"></i> {{ $item->viewers }} orang
                            melihat</span>
                        @if ($item['discount']['discounted'])
                            <div class="flex items-end justify-center gap-4 mt-2">
                                <span
                                    class="text-[10px] text-gray-500 line-through">{{ 'Rp ' . number_format($item['price'], 0, ',', '.') }}</span>
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
    </div>
@endsection
