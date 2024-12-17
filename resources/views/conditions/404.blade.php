<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops! Halaman Gak Ketemu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="text-center px-6">
        <h1 class="text-8xl font-extrabold text-blue-500">404</h1>
        <p class="text-2xl font-semibold text-gray-800 mt-4">Yah, Halaman Gak Ada!</p>
        <p class="text-gray-600 mt-2">
            Mungkin linknya salah atau halamannya udah dipindahin.
        </p>
        <div class="mt-6">
            <a href="{{ route('dashboard.index') }}" 
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded shadow-md transition">
                Balik ke Beranda
            </a>
        </div>
    </div>
</body>
</html>