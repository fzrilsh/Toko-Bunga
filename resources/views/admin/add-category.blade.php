@extends('components.layouts.admin')

@section('content')
    <main class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-semibold text-blue-800 mb-6">{{ request()->routeIs('admin.categories.create') ? 'Tambah Kategori Baru' : 'Edit Kategori' }}</h2>

        <form
            action="{{ request()->routeIs('admin.categories.edit') ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
            method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf

            @if (request()->routeIs('admin.categories.edit'))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="text" class="block text-gray-700 font-semibold mb-2">Nama Kategori @error('text')
                        <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                            *{{ $message }}
                        </span>
                    @enderror
                </label>
                <input type="text" id="text" name="text" value="{{ old('text', $category?->text) }}"
                    placeholder="Masukkan nama kategori"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    {{ request()->routeIs('admin.categories.create') ? 'Tambah Kategori' : 'Edit Kategori' }}
                </button>
            </div>
        </form>
    </main>
@endsection