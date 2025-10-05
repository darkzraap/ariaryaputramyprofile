<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-sub">

    {{-- Top Header Section --}}
    <section class="bg-sub w-full h-[8rem] flex items-center justify-center">
        <h1 class="text-white text-2xl font-bold">@ariaryaputra5</h1>
    </section>

    {{-- Navigation --}}
    @include('admin.layouts.navigation')

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-black w-full h-[3rem] flex items-center justify-center">
        <p class="text-white text-sm">&copy; 2025 ariaryaputra. All rights reserved.</p>
    </footer>

</body>
</html>
