<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>{{ config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @viteReactRefresh

    @vite('resources/css/app.css')

    @vite('resources/js/app.jsx')
    @inertiaHead
    @routes
  </head>
   <body class="font-sans antialiased bg-gray-100 sm:mx-none mx-20">
    @inertia
  </body>
</html>