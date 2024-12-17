@extends('components.layouts.admin')

@section('content')
    <main class="p-6 h-full">
        <h2 class="text-2xl font-semibold text-blue-800 mb-6">Daftar Halaman</h2>

        <div class="mb-4 flex justify-between items-center">
            <div class="w-full max-w-sm">
                <label for="search" class="sr-only">Search</label>
                <form method="GET" class="relative">
                    <input type="text" name="search" id="search" placeholder="Cari produk..."
                        value="{{ old('search', request()->input('search')) }}"
                        class="w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                    <button type="submit"
                        class="absolute inset-y-0 right-0 px-4 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600 focus:outline-none">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <a href="{{ route('admin.pages.create') }}" role="button"
                class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">+ Tambah Product</a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">ID</th>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">Title</th>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">Status</th>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">Created At</th>
                        <th class="py-3 px-6 text-left bg-blue-100 text-blue-800 font-semibold uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($pages as $page)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $page->id }}</td>
                            <td class="py-3 px-6">{{ $page->title }}</td>
                            <td class="py-3 px-6"><span class="px-2 py-1 bg-{{ $page->status === 'published' ? 'green' : 'yellow' }}-100 text-{{ $page->status === 'published' ? 'green' : 'yellow' }}-700 rounded">{{ ucfirst($page->status) }}</span></td>
                            <td class="py-3 px-6">{{ \Carbon\Carbon::parse($page->created_at)->format('M d, Y') }}</td>
                            <td class="py-3 px-6">
                                <button onclick="window.location.href = '{{ route('admin.pages.edit', $page) }}'"
                                    class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">Edit</button>
                                <form class="inline" action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="handleDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $pages->links('vendor.pagination.custom') }}
    </main>
@endsection

@push('scripts')
    <script>
        function handleDelete(event){
            event.preventDefault()

            if(confirm('Apakah kamu yakin ingin menghapus product ini?')){
                event.target.submit()
            }
        }
    </script>
@endpush