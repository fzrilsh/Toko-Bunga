<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @if (env('APP_ENV') === 'production')
        <link rel="stylesheet" href="{{ asset('public/build/assets/app.css') }}">
    @else
        @vite('resources/css/app.css')
    @endif
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold text-blue-800 mb-6 text-center">Login</h1>

        @error('error')
            <div class="p-2 mt-1 text-xs text-red-800 rounded-lg bg-red-200" role="alert">
                <span class="font-medium">Gagal!</span> {{ $message }}
            </div>
        @enderror
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input type="username" id="username" name="username"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="john.doe" required>
                @error('username')
                    <div class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                        *{{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="*********" required>
                @error('password')
                    <div class="p-2 mt-1 text-xs text-red-800 rounded-lg" role="alert">
                        *{{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                Login
            </button>
        </form>
    </div>

</body>

</html>
