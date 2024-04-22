import PropTypes from "prop-types";

const Results = ({ recipes, filter }) => {
    const highlightText = (text, filter) => {
        if (!filter) return text;
        const regex = new RegExp(
            `(${filter.replace(/a$/, "(s|s|s|mos|n)?")})`,
            "gi"
        );
        return text.replace(
            regex,
            "<span class='font-bold text-2xl text-indigo-500'>$1</span>"
        );
    };

    return (
        <>
            <h1 className="border-b mb-4  border-gray-900/10 py-4 text-lg">
                <span className="font-bold">Search Results for: </span>
                {filter}
            </h1>

            <ul role="list" className="divide-y divide-gray-200">
                {recipes.map((recipe) => (
                    <li key={recipe.id} className="py-4">
                        <div className="grid">
                            <div className="font-semibold text-xl">
                                <span
                                    dangerouslySetInnerHTML={{
                                        __html: highlightText(
                                            recipe.title,
                                            filter
                                        ),
                                    }}
                                />
                            </div>
                            <div>
                                <span
                                    dangerouslySetInnerHTML={{
                                        __html: highlightText(
                                            recipe.body,
                                            filter
                                        ),
                                    }}
                                />
                            </div>
                        </div>
                    </li>
                ))}
            </ul>
        </>
    );
};

Results.propTypes = {
    recipes: PropTypes.array.isRequired,
    filter: PropTypes.string.isRequired,
};

export default Results;
