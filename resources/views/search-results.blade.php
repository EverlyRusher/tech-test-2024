<h1 class="font-bold text-2xl mb-4">
  Search Results for: {{ $searchTerm ?? '' }}
</h1>

<ul role="list" class="divide-y divide-gray-200">
  @if (count($recipes) > 0)
    @foreach ($recipes as $recipe)
      <li v-for="item in items" :key="item.id" class="py-4 border-2 border-gray-300 rounded-lg mb-4 shadow-lg animate__animated animate__fadeIn">
        <div class="grid grid-cols-1 gap-2">
          <div class="font-semibold text-lg text-indigo-600 mb-2">{{ $recipe->title }}</div>
          <div class="text-gray-700 text-justify">{{ $recipe->body }}</div>
        </div>
      </li>
    @endforeach
  @else
    <li class="py-4 text-red-500">No recipes found matching your search.</li>
  @endif
</ul>
