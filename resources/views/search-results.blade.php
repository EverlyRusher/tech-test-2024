@if ($searchTerm ?? null)
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
@endif
