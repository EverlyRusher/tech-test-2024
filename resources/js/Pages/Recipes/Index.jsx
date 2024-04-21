export default () => {
    return (
        <>
            <div class="mx-auto max-w-2xl">
                <form action="{{ route('recipe.filter') }}" method="GET">
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">
                                Recipe.ai Search
                            </h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">
                                Look for your favorite recipes and discover new
                                ones.
                            </p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label
                                        for="filter"
                                        class="block text-sm font-semibold leading-6 text-gray-900"
                                    >
                                        Search query
                                    </label>
                                    <div class="mt-2 flex space-x-2">
                                        <input
                                            type="search_query"
                                            name="filter"
                                            id="filter"
                                            class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            placeholder="Recipe name, description or word"
                                        />
                                        <button
                                            type="submit"
                                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                        >
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {/* @include('search-results') */}
            </div>
        </>
    );
};

//export default Index;
