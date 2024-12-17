@extends('components.layouts.admin')

@section('content')
    <main class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-semibold text-blue-800 mb-6">{{ request()->routeIs('admin.products.create') ? 'Tambah Produk Baru' : 'Edit Produk' }}</h2>

        <form
            action="{{ request()->routeIs('admin.products.edit') ? route('admin.products.update', $product) : route('admin.products.store') }}"
            method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf

            @if (request()->routeIs('admin.products.edit'))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Produk @error('name')
                        <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                            *{{ $message }}
                        </span>
                    @enderror
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $product?->name) }}"
                    placeholder="Masukkan nama produk"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Deskripsi @error('description')
                        <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                            *{{ $message }}
                        </span>
                    @enderror
                </label>
                <textarea id="description" name="description" minlength="100" placeholder="Masukkan deskripsi produk" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description', $product?->description) }}</textarea>
            </div>

            <div class="flex items-center space-x-4 mb-4">
                <div class="flex-1">
                    <label for="price" class="block text-gray-700 font-semibold mb-2">Harga @error('price')
                        <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                            *{{ $message }}
                        </span>
                    @enderror</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $product?->price) }}"
                        placeholder="Masukkan harga produk"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="flex-1">
                    <label for="discount" class="block text-gray-700 font-semibold mb-2">Diskon @error('discount')
                        <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                            *{{ $message }}
                        </span>
                    @enderror</label>
                    <input type="number" id="discount" name="discount"
                        min="0"
                        value="{{ old('discount', $product?->discount['percentraw'] ?? 0) }}"
                        placeholder="Masukkan diskon untuk produk"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold mb-2">Gambar Produk @error('image')
                    <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                        *{{ $message }}
                    </span>
                @enderror</label>
                @if ($product?->image)
                    <div class="flex items-center space-x-4 mb-2">
                        <img src="{{ asset('public/storage/' . $product->image) }}"
                            class="object-contain w-16 h-16 rounded">
                        <span class="text-gray-500">Gambar sudah ada</span>
                    </div>
                @endif
                <input type="file" id="image" name="image" accept=".png,.jpeg,.jpg,.webp"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="keyword" class="block text-gray-700 font-semibold mb-2">Kata Kunci @error('keyword')
                    <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                        *{{ $message }}
                    </span>
                @enderror</label>
                <input type="text" id="keyword" name="keyword" value="{{ old('keyword', $product?->keyword) }}"
                    placeholder="Masukkan kata kunci, pisahkan dengan koma"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-semibold mb-2">Kategori @error('category_id')
                    <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                        *{{ $message }}
                    </span>
                @enderror</label>
                <select id="category" name="category_id"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Pilih kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product?->category) == $category->text ? 'selected' : '' }}>
                            {{ $category->text }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Tipe Produk</h2>
                <div id="type-container" class="space-y-4">
                    @foreach ($product?->types ?? [] as $key => $item)
                        <div class="flex items-center space-x-4 mb-4" id="type-groups">
                            <input type="hidden" name="types[{{ $key }}][id]" value="{{ $item['id'] }}">
                            <input type="text" name="types[{{ $key }}][name]"
                                value="{{ old('types.' . $key . '.name', $item['name']) }}" placeholder="Type Name"
                                class="w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <input type="number" name="types[{{ $key }}][price]"
                                value="{{ old('types.' . $key . '.price', $item['price']) }}" placeholder="Price"
                                class="w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            @if ($item['image'])
                                <img src="{{ asset('public/storage/' . $item['image']) }}"
                                    class="object-contain w-16 h-16 rounded">
                            @endif
                            <input type="file" name="types[{{ $key }}][image]" accept=".png,.jpeg,.jpg,.webp"
                                class="w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="button" onclick="this.parentElement.remove()"
                                class="text-red-500 hover:underline">Remove</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" onclick="addTypeRow()"
                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Add Type
                </button>
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    {{ request()->routeIs('admin.products.create') ? 'Tambah Produk' : 'Edit Produk' }}
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
                <input type="file" name="types[${groups}][image]" accept=".png,.jpeg,.jpg,.webp" class="w-1/3 px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:underline">Remove</button>
            `;

            typeContainer.appendChild(typeRow);
        }
    </script>
@endpush
