<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">

<head>
    @include('partials.head')
    @stack('styling')
</head>

<body class="bg-bridal-heath-50 overflow-x-hidden">
    @include('partials.header')

    <main class="w-full overflow-x-hidden">
        @yield('content')
    </main>

    @include('partials.whatsapp-button')
    @include('partials.footer')
    @stack('scripts')
</body>


</html>
