@extends('components.layouts.admin')

@section('content')
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Produk Baru</h1>

        <form action="{{ route('admin.products.interact', $product) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded shadow-md">
            @csrf
            <!-- Nama Produk -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Produk</label>
                <input type="text" value="{{ $product?->name }}" id="name" name="name"
                    placeholder="Masukkan nama produk"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" @required(!$product?->name)>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea id="description" name="description" placeholder="Masukkan deskripsi produk"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" @required(!$product?->description)>{{ $product?->description }}</textarea>
            </div>

            <!-- Harga -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-semibold mb-2">Harga</label>
                <input type="number" id="price" value="{{ $product?->price }}" name="price"
                    placeholder="Masukkan harga produk"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" @required(!$product?->price)>
            </div>

            <!-- Gambar -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold mb-2">Gambar Produk</label>
                @if ($product?->image)
                    <img src="{{ asset('public/storage/' . $product->image) }}" class="object-contain" width="50" height="50" alt="">
                @endif
                <input type="file" id="image" name="image" accept=".png,.jpeg,.jpg,.webp"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    @required(!$product?->image)>
            </div>

            <!-- Kata Kunci -->
            <div class="mb-4">
                <label for="keyword" class="block text-gray-700 font-semibold mb-2">Kata Kunci</label>
                <input type="text" id="keyword" value="{{ $product?->keyword }}" name="keyword"
                    placeholder="Masukkan kata kunci, pisahkan dengan koma"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" @required(!$product?->keyword)>
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-semibold mb-2">Kategori</label>
                <select id="category" name="category_id"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" @required(!$product?->category)>
                    <option value="">Pilih kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected($category->text === $product?->category)>{{ $category->text }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tipe Produk -->
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Tipe Produk</h2>
                <div id="type-container" class="space-y-4">
                    @foreach ($product?->types ?? [] as $key => $item)
                        <div class="flex items-center space-x-4 mb-4" id="type-groups">
                            <input type="hidden" name="types[{{ $key }}][id]" value="{{ $item['id'] }}">
                            <input type="text" name="types[{{ $key }}][name]" value="{{ $item['name'] }}" placeholder="Type Name" class="w-1/3 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <input type="number" name="types[{{ $key }}][price]" value="{{ $item['price'] }}" placeholder="Price" class="w-1/3 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @if ($item['image'])
                                <img src="{{ asset('public/storage/' . $item['image']) }}" class="object-contain" width="50" height="50" alt="">
                            @endif
                            <input type="file" name="types[{{ $key }}][image]" accept="image/*" class="w-1/3 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:underline">Remove</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" onclick="addTypeRow()"
                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Add Type
                </button>
            </div>

            <!-- Submit -->
            <div class="mt-6 text-right">
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Tambah Produk
                </button>
            </div>
        </form>
    </main>
@endsection

@push('scripts')
    <script>
        function addTypeRow() {
            const typeContainer = document.getElementById('type-container');
            const typeRow = document.createElement('div');
            const groups = document.querySelectorAll('#type-groups').length;

            typeRow.id = 'type-groups'
            typeRow.className = "flex items-center space-x-4 mb-4";
            typeRow.innerHTML = `
                <input type="text" name="types[${groups}][name]" placeholder="Type Name" class="w-1/3 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <input type="number" name="types[${groups}][price]" placeholder="Price" class="w-1/3 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <input type="file" name="types[${groups}][image]" accept="image/*" class="w-1/3 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:underline">Remove</button>
            `;

            typeContainer.appendChild(typeRow);
        }
    </script>
@endpush
