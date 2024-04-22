import SearchFilter from "./SearchFilter";

const Header = () => {
    return (
        <div className="space-y-12">
            <div className=" pb-12">
                <h2 className="text-3xl font-bold leading-7 text-indigo-900">
                    Recipe.ai Search TEST
                </h2>
                <p className="mt-1 text-sm leading-6 text-gray-600">
                    Look for your favorite recipes and discover new ones.
                </p>
                <SearchFilter />
            </div>
        </div>
    );
};

export default Header;
