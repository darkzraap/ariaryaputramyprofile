<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'My Laravel App')</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Edu+NSW+ACT+Cursive:wght@400..700&family=Inter:wght@100..900&family=Josefin+Sans:wght@100..700&family=Libre+Franklin:wght@100..900&family=Poppins:wght@100..900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">

  <!-- Preload Tailwind CSS -->
  <link rel="preload" href="{{ Vite::asset('resources/css/app.css') }}" as="style">

  <!-- Vite CSS + JS -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
