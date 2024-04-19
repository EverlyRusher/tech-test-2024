<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    @vite('resources/css/app.css')
  </head>
  <body class="font-sans antialiased bg-gray-100">
    <div class="mt-8 mx-auto max-w-2xl p-6 bg-white rounded-lg shadow-md flex flex-col items-center relative">

      <form action="{{ route('recipe.filter') }}" method="GET" class="w-full">
        <div class="space-y-12">
          <div class="pb-12">
            <h2 class="realtive text-2xl font-bold leading-7 text-gray-900 text-center">
              Recipe.ai Search
              <span class="absolute animate-bounce">{{ $random_emoji }}</span>
            </h2>
            <p class="mt-1 text-sm leading-6 text-gray-600 text-center">
              Look for your favorite recipes and discover new ones.
            </p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 justify-items-center">
              <div class="sm:col-span-4">

                <label for="search_query" class="block text-sm font-semibold leading-6 text-gray-900">
                    Search query
                </label>
                <div class="mt-2 flex space-x-2">
                  <input type="search_query" name="search_query" id="search_query" class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Recipe name, description or word" />
                  <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Search</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="mt-8 mx-auto w-2/3 p-6 bg-white rounded-lg shadow-md">
      @include('search-results')
    </div>


    <script>
      document.addEventListener('DOMContentLoaded', (event) => {
        let searchInput = document.querySelector('#search_query');
        let resultsList = document.querySelector('.divide-y');

        searchInput.addEventListener('input', function(e) {
          let searchQuery = e.target.value;

          fetch('/recipes/search?search_query=' + searchQuery)
            .then(response => response.json())
            .then(recipes => {
              // Clear the results list
              resultsList.innerHTML = '';

              // Iterate over the recipes
              recipes.forEach(recipe => {
                // Create a new list item
                let listItem = document.createElement('li');
                listItem.className = 'py-4 border-2 border-gray-300 rounded-lg mb-4 shadow-lg animate__animated animate__fadeIn';
                // Create the grid div
                let gridDiv = document.createElement('div');
                gridDiv.className = 'grid grid-cols-1 gap-2 p-4';

                // Create the title div
                let titleDiv = document.createElement('div');
                titleDiv.className = 'font-semibold text-lg text-indigo-600 mb-2';
                titleDiv.textContent = recipe.title;

                // Create the body div
                let bodyDiv = document.createElement('div');
                bodyDiv.className = 'text-gray-700 text-justify';
                bodyDiv.textContent = recipe.body;

                // Append the title and body divs to the grid div
                gridDiv.appendChild(titleDiv);
                gridDiv.appendChild(bodyDiv);

                // Append the grid div to the list item
                listItem.appendChild(gridDiv);

                // Append the list item to the results list
                resultsList.appendChild(listItem);
              });
            });
        });
      });
    </script>

  </body>
</html>
