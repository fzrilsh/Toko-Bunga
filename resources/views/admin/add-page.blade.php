@extends('components.layouts.admin')

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">

    <style>
        #editor-container {
            height: 400px;
            background-color: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
        }
    </style>
@endpush

@section('content')
    <main class="p-6">
        <h2 class="text-2xl font-semibold text-blue-800 mb-6">{{ request()->routeIs('admin.pages.create') ? 'Tambah Halaman Baru' : 'Edit Halaman' }}</h2>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ request()->routeIs('admin.pages.edit') ? route('admin.pages.update', $page) : route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if (request()->routeIs('admin.pages.edit'))
                    @method('PUT')
                @endif

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Judul @error('title')
                        <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                            *{{ $message }}
                        </span>
                    @enderror</label>
                    <input type="text" id="title" name="title" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Enter blog title"
                        value="{{ old('title', $page?->title) }}">
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-semibold mb-2">Konten @error('content')
                        <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                            *{{ $message }}
                        </span>
                    @enderror</label>
                    <div id="editor-container" class="mt-1"></div>
                    <input type="hidden" id="content" name="content" value="{{ old('content', $page?->content) }}">
                </div>

                <div class="mb-4">
                    <label for="featured_image" class="block text-gray-700 font-semibold mb-2">Gambar unggulan @error('featured_image')
                        <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                            *{{ $message }}
                        </span>
                    @enderror</label>
                    @if ($page?->featured_image)
                        <div class="flex items-center space-x-4 mb-2">
                            <img src="{{ asset('storage/' . $page->featured_image) }}"
                                class="object-contain w-16 h-16 rounded">
                            <span class="text-gray-500">Gambar sudah ada</span>
                        </div>
                    @endif
                    <input type="file" id="featured_image" name="featured_image" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('featured_image', $page?->featured_image) }}">
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                    <select id="status" name="status" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="draft" @selected(old('status', $page?->status) === 'draft')>Draft</option>
                        <option value="published" @selected(old('status', $page?->status) === 'published')>Publish</option>
                    </select>
                </div>

                <div class="mt-6">
                    <button type="submit" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>

    <script>
        var toolbarOptions = [
            [{ header: [1, 2, 3, 4, 5, false] }],
            [{ font: [] }],
            [{ size: ['small', false, 'large', 'huge'] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ color: [] }, { background: [] }],
            [{ script: 'sub' }, { script: 'super' }],
            [{ align: [] }],
            [{ list: 'ordered' }, { list: 'bullet' }],
            [{ indent: '-1' }, { indent: '+1' }],
            ['blockquote', 'code-block'],
            ['link', 'image', 'video'],
            ['clean']
        ];

        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions,
                imageResize: { modules: ['Resize', 'DisplaySize', 'Toolbar'] }
            }
        });

        var defaultContent = `{!! old('content', $page?->content ?? '') !!}`;
        quill.clipboard.dangerouslyPasteHTML(defaultContent);

        const hiddenInput = document.getElementById("content");
        quill.on("text-change", function () {
            hiddenInput.value = quill.root.innerHTML;
        });
    </script>
@endpush