@extends('components.layouts.admin')

@section('content')
    <main class="flex-1 p-6 overflow-y-auto">
        <h2 class="text-2xl font-semibold text-blue-800 mb-6">Konfigurasi</h2>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form id="configuration-form" action="{{ route('admin.configuration.store') }}" method="POST">
                @csrf
                <div class="space-y-6" id="formContainer">
                    @foreach ($options as $index => $option)
                        <div class="grid grid-cols-3 gap-6" id="type-groups">
                            <div>
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
                            <div>
                                <label for="type" class="block w-32 m-0 text-gray-700 font-medium">Type</label>
                                <input type="text" id="type" name="options[{{ $option->key }}][type]" value="{{ $option->type }}"
                                    class="w-44 px-4 py-2 bg-gray-200 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                    placeholder="Enter type" readonly>
                            </div>
                            <div>
                                <label for="remove" class="block text-gray-700 font-medium">Actions</label>
                                <button type="button" onclick="removeOption(event)"
                                    class="w-44 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 bg-red-500 text-white hover:bg-red-600 disabled:opacity-80"
                                    @disabled($option->type === 'aplikasi')>Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="space-y-4">
                    <button type="submit"
                        class="w-full md:w-auto bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                        Simpan konfigurasi
                    </button>
                    <button type="button" id="addOptionBtn"
                        class="w-full md:w-auto bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">
                        + Tambah
                    </button>
                </div>
            </form>
        </div>
    </main>

    <div id="addOptionModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Add New Option</h2>
            <form id="addOptionForm">
                <div class="mb-4">
                    <label for="key" class="block text-sm font-medium text-gray-600">Key</label>
                    <input type="text" id="key" name="key" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-600">Key</label>
                    <input type="text" id="type" name="type" value="sosial media" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:bg-gray-200" disabled>
                </div>
                <div class="mb-4">
                    <label for="value" class="block text-sm font-medium text-gray-600">Value</label>
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
        const addOptionBtn = document.getElementById('addOptionBtn');
        const addOptionModal = document.getElementById('addOptionModal');
        const cancelModalBtn = document.getElementById('cancelModalBtn');
        const addOptionForm = document.getElementById('addOptionForm');
        const formContainer = document.querySelector('#formContainer');

        addOptionBtn.addEventListener('click', () => {
            addOptionModal.classList.remove('hidden');
        });

        cancelModalBtn.addEventListener('click', () => {
            addOptionModal.classList.add('hidden');
        });

        addOptionForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const key = document.getElementById('key').value.trim();
            const value = document.getElementById('value').value.trim();
            const groups = document.querySelectorAll('#type-groups').length;

            if (key && value) {
                const row = document.createElement('div');
                row.className = 'grid grid-cols-3 gap-6';
                row.id = 'type-groups';

                row.innerHTML = `
                    <div>
                        <label for="${key}"
                            class="block text-gray-700 font-medium">${key.charAt(0).toUpperCase() + key.slice(1)}</label>
                        @if ($option->key === 'selogan' || $option->key === 'latar belakang')
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                id="${key}" name="options[${key}][value]" cols="30" rows="3">${value}</textarea>
                        @else
                            <input type="text" id="${key}" name="options[${key}][value]"
                                value="${value}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter key name" required>
                        @endif
                    </div>
                    <div>
                        <label for="type" class="block w-32 m-0 text-gray-700 font-medium">Type</label>
                        <input type="text" id="type" name="options[${key}][type]" value="sosial media"
                            class="w-44 px-4 py-2 bg-gray-200 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter type" readonly>
                    </div>
                    <div>
                        <label for="remove" class="block text-gray-700 font-medium">Actions</label>
                        <button type="button" onclick="removeOption(event)"
                            class="w-44 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 bg-red-500 text-white hover:bg-red-600 disabled:opacity-80"
                            @disabled($option->type === 'aplikasi')>Remove</button>
                    </div>
                `;

                formContainer.appendChild(row);
                addOptionModal.classList.add('hidden');
                addOptionForm.reset();

                document.getElementById('configuration-form').submit()
            }
        });

        function removeOption(event){
            event.target.parentElement.parentElement.remove()
            document.getElementById('configuration-form').submit()
        }
    </script>
@endpush
