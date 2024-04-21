import { usePage } from "@inertiajs/react";
import SearchFilter from "./components/SearchFilter";
import Results from "./components/Results";

const Index = () => {
    const { recipes, filter } = usePage().props;
    console.log("HOLA:", filter);
    return (
        <>
            <div className="mx-auto max-w-2xl mt-10">
                <div className="space-y-12">
                    <div className=" pb-12">
                        <h2 className="text-3xl font-bold leading-7 text-indigo-900">
                            Recipe.ai Search TEST
                        </h2>
                        <p className="mt-1 text-sm leading-6 text-gray-600">
                            Look for your favorite recipes and discover new
                            ones.
                        </p>
                        <SearchFilter />
                    </div>
                </div>
                {recipes.length > 0 && (
                    <>
                        <h1 className="border-b mb-4  border-gray-900/10 py-4 text-lg">
                            <span className="font-bold">
                                Search Results for:{" "}
                            </span>
                            {filter}
                        </h1>
                        <Results recipes={recipes} filter={filter} />{" "}
                    </>
                )}

                {filter && recipes.length == 0 && (
                    <p> No recipes found matching your search.</p>
                )}
            </div>
        </>
    );
};

export default Index;
