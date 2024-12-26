@extends('components.layouts.admin')

@section('content')
    <main class="flex-1 p-6 overflow-y-auto">
        <h2 class="text-2xl font-semibold text-blue-800 mb-6">Konfigurasi</h2>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form id="configuration-form" action="{{ route('admin.configuration.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    @foreach ($options->groupBy('type') as $type => $group)
                        <div class="border rounded-lg shadow p-4">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800 cursor-pointer" onclick="toggleType('{{ $type }}')">
                                    {{ ucfirst($type) }}
                                </h3>
                                <button type="button" class="text-sm text-blue-500" onclick="toggleType('{{ $type }}')">
                                    Lihat
                                </button>
                            </div>

                            <div id="type-{{ $type }}" class="hidden mt-4 space-y-4">
                                <div id="container" class="grid grid-cols-1 gap-4">
                                    @foreach ($group as $option)
                                        <div class="grid grid-cols-2 gap-6" id="type-groups">
                                            <div class="col-span-1 w-full">
                                                <label for="{{ $option->key }}"
                                                    class="block text-gray-700 font-medium">{{ ucfirst($option->key) }}</label>
                                                @if ($option->key === 'selogan' || $option->key === 'latar belakang')
                                                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                                        id="{{ $option->key }}" name="options[{{ $option->key }}][value]" cols="30" rows="3">{{ $option->value }}</textarea>
                                                @else
                                                    <input type="text" id="{{ $option->key }}" name="options[{{ $option->key }}][value]"
                                                        value="{{ $option->value }}"
                                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                                        placeholder="Enter key name" required>
                                                @endif
                                            </div>
                                            <input type="hidden" name="options[{{ $option->key }}][type]" value="{{ $option->type }}">
                                            <div class="col-span-1 w-1/3">
                                                <label for="remove" class="block text-gray-700 font-medium">Aksi</label>
                                                <button type="button" onclick="removeOption(event)"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-red-500 text-white hover:bg-red-600">
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($type === 'sosial media')
                                    <button type="button" class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                                        onclick="openAddOptionModal('{{ $type }}')">
                                        + Tambah Sosial Media
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full md:w-auto bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                        Simpan konfigurasi
                    </button>
                </div>
            </form>
        </div>
    </main>

    <div id="addOptionModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Tambah Sosial Media</h2>
            <form id="addOptionForm">
                <input type="hidden" id="modalType" name="type">
                <div class="mb-4">
                    <label for="key" class="block text-sm font-medium text-gray-600">Nama</label>
                    <input type="text" id="key" name="key" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="value" class="block text-sm font-medium text-gray-600">Link</label>
                    <input type="text" id="value" name="value" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="cancelModalBtn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const addOptionModal = document.getElementById('addOptionModal');
        const modalType = document.getElementById('modalType');
        const cancelModalBtn = document.getElementById('cancelModalBtn');
        const addOptionForm = document.getElementById('addOptionForm');

        function toggleType(type) {
            const group = document.getElementById(`type-${type}`);
            if (group.classList.contains('hidden')) {
                group.classList.remove('hidden');
            } else {
                group.classList.add('hidden');
            }
        }

        function openAddOptionModal(type) {
            modalType.value = type;
            addOptionModal.classList.remove('hidden');
        }

        cancelModalBtn.addEventListener('click', () => {
            addOptionModal.classList.add('hidden');
        });

        addOptionForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const type = modalType.value;
            const key = document.getElementById('key').value.trim();
            const value = document.getElementById('value').value.trim();

            if (key && value) {
                const container = document.getElementById(`type-${type}`).querySelector('#container');
                const row = document.createElement('div');

                row.className = 'grid grid-cols-2 gap-6';
                row.innerHTML = `
                    <div class="cols-span-1 w-full">
                        <label for="${key}" class="block text-gray-700 font-medium">${key.substring(0, 1).toUpperCase() + key.slice(1)}</label>
                        <input type="text" id="${key}" name="options[${key}][value]"
                            value="${value}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="cols-span-1 w-1/3">
                        <label for="remove" class="block text-gray-700 font-medium">Actions</label>
                        <button type="button" onclick="removeOption(event)"
                            class="w-full px-4 py-2 border border-gray-300 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Remove
                        </button>
                    </div>
                `;
                
                container.appendChild(row);
                addOptionModal.classList.add('hidden');
                addOptionForm.reset();
            }
        });

        function removeOption(event) {
            event.target.closest('.grid').remove();
        }
    </script>
@endpush