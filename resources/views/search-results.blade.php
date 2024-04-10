<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name')}} - Search </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
  </head>
  <body class="font-sans antialiased bg-gray-100">
    <div class="mx-auto max-w-2xl">
      <h1>Search Results for: {{ $searchTerm }}</h1>

      @if (count($recipes) > 0)
        <ul role="list" class="divide-y divide-gray-200">
          @foreach ($recipes as $recipe)
            <li v-for="item in items" :key="item.id" class="py-4">
              <div class="flex">
                <div>{{ $recipe->title }}</div>
                <div>{{ $recipe->body }}</div>
              </div>

            </li>
          @endforeach
        </ul>
      @else
        <p>No recipes found matching your search.</p>
      @endif
    </div>
  </body>
</html>
