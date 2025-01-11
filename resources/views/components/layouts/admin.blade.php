<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @if (env('APP_ENV') === 'production')
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    @else
        @vite('resources/css/app.css')
    @endif

    @stack('styles')
</head>

<body class="flex h-[150vh] bg-gray-100">

    <aside id="sidebar"
        class="fixed h-full inset-y-0 left-0 w-64 bg-blue-800 text-white transform -translate-x-full transition-transform duration-300 lg:translate-x-0 lg:relative lg:transform-none z-40">
        <div class="p-6">
            <h1 class="text-2xl font-bold">Admin Dashboard</h1>
        </div>
        <nav class="flex-1 px-4 space-y-4">
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded-md hover:bg-blue-700"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="{{ route('admin.categories.index') }}" class="block py-2 px-4 rounded-md hover:bg-blue-700"><i class="fas fa-boxes"></i> Product Categories</a>
            <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 rounded-md hover:bg-blue-700"><i class="fas fa-box-open"></i> Products</a>
            <a href="{{ route('admin.pages.index') }}" class="block py-2 px-4 rounded-md hover:bg-blue-700"><i class="fas fa-file-alt"></i> Pages</a>
            <a href="{{ route('admin.configuration.index') }}" class="block py-2 px-4 rounded-md hover:bg-blue-700"><i class="fas fa-cogs"></i> Configuration</a>
            <a href="{{ route('admin.profile.index') }}" class="block py-2 px-4 rounded-md hover:bg-blue-700"><i class="fas fa-user"></i> Profile</a>
            <a href="{{ route('logout') }}" class="block py-2 px-4 rounded-md hover:bg-red-700 mt-4"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col">
        <!-- Navbar for Mobile -->
        <header class="bg-blue-800 text-white flex items-center justify-between px-6 py-4 lg:hidden">
            <button id="hamburger-sidebar" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h1 class="text-xl font-bold">Admin Dashboard</h1>
        </header>

        @yield('content')
    </div>

    @stack('scripts')
    <script>
        const button = document.getElementById('hamburger-sidebar')
        button.onclick = () => {
            const sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        }

        document.querySelector('main').onclick = () => {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.add('-translate-x-full');
        }
    </script>
</body>

</html>
