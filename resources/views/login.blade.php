<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold text-blue-800 mb-6 text-center">Masuk</h1>

        @error('error')
            <div class="p-2 mt-1 text-xs text-red-800 rounded-lg bg-red-200" role="alert">
                <span class="font-medium">Gagal!</span> {{ $message }}
            </div>
        @enderror
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                @error('username')
                    <div class="p-0 m-0 text-xs text-red-800 rounded-lg" role="alert">
                        *{{ $message }}
                    </div>
                @enderror
                <input type="username" id="username" name="username"
                    class="p-2 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="john.doe">
            </div>

            <div class="mb-4">
                <label for="password" class="flex flex-row justify-between items-center text-sm font-medium text-gray-700 mb-2">Password <span class="cursor-pointer select-none" onclick="show(event)"><i class="fas fa-eye"></i> Show</span></label>
                @error('password')
                    <div class="p-0 mt-0 text-xs text-red-800 rounded-lg" role="alert">
                        *{{ $message }}
                    </div>
                @enderror
                <input type="password" id="password" name="password"
                    class="p-2 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="********">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                Kirim
            </button>
        </form>
    </div>

    <script>
        const password = document.getElementById('password')

        function show(e){
            let button = e.target
            let icon = button.querySelector('i')

            password.type = 'text'
            password.placeholder = 'password'

            button.innerHTML = '<i class="fas fa-eye-slash"></i> Hide'
            button.onclick = hide
        }

        function hide(e){
            let button = e.target
            let icon = button.querySelector('i')

            password.type = 'password'
            password.placeholder = '********'

            button.innerHTML = '<i class="fas fa-eye"></i> Show'
            button.onclick = show
        }

    </script>
</body>

</html>
