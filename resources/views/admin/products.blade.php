@extends('components.layouts.admin')

@section('content')
    <main class="p-6 h-full">
        <h2 class="text-2xl font-semibold text-blue-800 mb-6">Daftar Produk</h2>

        <div class="mb-4 flex justify-between items-center">
            <div class="w-full max-w-sm">
                <label for="search" class="sr-only">Search</label>
                <form method="GET" class="relative">
                    <input type="text" name="search" id="search" placeholder="Cari produk..."
                        value="{{ request()->input('search') }}"
                        class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                    <button
                        type="submit"
                        class="absolute inset-y-0 right-0 px-4 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600 focus:outline-none">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <a href="{{ route('admin.products.interact') }}" role="button" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">+ Tambah Product</a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">ID</th>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">
                            Nama Produk
                        </th>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">Harga</th>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">Category</th>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">Discount</th>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">Sold</th>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($products as $product)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $product->id }}</td>
                            <td class="py-3 px-6">{{ $product->name }}</td>
                            <td class="py-3 px-6">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</td>
                            <td class="py-3 px-6">{{ $product->category }}</td>
                            <td class="py-3 px-6">{{ $product->discount['percent'] }}</td>
                            <td class="py-3 px-6">{{ $product->sold }}</td>
                            <td class="py-3 px-6">
                                <button class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600">+Sold</button>
                                <button onclick="window.location.href = '{{ route('admin.products.interact', $product) }}'" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">Edit</button>
                                <button class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Section -->
        {{ $products->links('vendor.pagination.custom') }}
    </main>
@endsection