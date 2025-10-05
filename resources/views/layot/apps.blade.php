<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'My Laravel App')</title>

<link rel ='shortcut icon' href='{{ asset('images/favcon.jpeg') }}' type ='image/x-icon' />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Edu+NSW+ACT+Cursive:wght@400..700&family=Inter:wght@100..900&family=Josefin+Sans:wght@100..700&family=Libre+Franklin:wght@100..900&family=Poppins:wght@100..900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter bg-black text-white">
  @yield('content')
</body>
</html>
