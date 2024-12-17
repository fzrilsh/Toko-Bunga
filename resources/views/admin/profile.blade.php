@extends('components.layouts.admin')

@section('content')
    <main class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-semibold text-blue-800 mb-6">Edit Profile</h2>

        <form
            action="{{ route('admin.profile.store') }}"
            method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf

            <div class="mb-4">
                <label for="text" class="block text-gray-700 font-semibold mb-2">Username @error('username')
                        <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                            *{{ $message }}
                        </span>
                    @enderror
                </label>
                <input type="text" id="username" name="username" value="{{ old('username', $user?->username) }}"
                    placeholder="Masukkan username"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="text" class="block text-gray-700 font-semibold mb-2">Password baru @error('password')
                        <span class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                            *{{ $message }}
                        </span>
                    @enderror
                </label>
                <input type="text" id="password" name="password" min="8" value="{{ old('password', '') }}"
                    placeholder="Masukkan password baru"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </main>
@endsection

@push('scripts')
    <script>

    </script>
@endpush