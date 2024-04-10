<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
  </head>
  <body class="font-sans antialiased bg-gray-100">
    <div class="mx-auto max-w-2xl">
  <div class="bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
          Recipe.ai Search
      </h2>
      <p class="mt-6 text-lg leading-8 text-gray-600">
        Look for your favorite recipes and discover new ones.
      </p>
    </div>
  </div>
    </div>
  </body>
</html>
