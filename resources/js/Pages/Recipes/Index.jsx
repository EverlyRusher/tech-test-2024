import { usePage } from "@inertiajs/react";
import Results from "./components/Results";
import Header from "./components/Header";

const Index = () => {
    const { recipes, filter } = usePage().props;

    return (
        <>
            <div className="mx-auto max-w-2xl mt-10">
                <Header />
                {recipes.length > 0 && (
                    <Results recipes={recipes} filter={filter} />
                )}

                {filter && recipes.length == 0 && (
                    <p> No recipes found matching your search.</p>
                )}
            </div>
        </>
    );
};

export default Index;
