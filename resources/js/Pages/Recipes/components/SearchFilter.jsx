import { router, usePage } from "@inertiajs/react";
import pickBy from "lodash/pickBy";
import { useEffect, useState } from "react";
import { usePrevious } from "react-use";

export default () => {
    const { filter } = usePage().props;

    const [values, setValues] = useState({
        filter: filter || "",
    });

    const prevValues = usePrevious(values);

    function reset() {
        setValues({
            filter: "",
        });
    }

    useEffect(() => {
        if (prevValues) {
            const query = Object.keys(pickBy(values)).length
                ? pickBy(values)
                : "";

            router.get(route(route().current()), query, {
                replace: true,
                preserveState: true,
            });
        }
    }, [values]);

    function handleChange(e) {
        const key = e.target.name;
        const value = e.target.value;

        setValues((values) => ({
            ...values,
            [key]: value,
        }));
    }

    return (
        <div className="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div className="sm:col-span-4">
                <label
                    htmlFor="filter"
                    className="block text-lg font-semibold leading-6 text-gray-900"
                >
                    Search recipe
                </label>
                <div className="mt-2 flex space-x-2">
                    <input
                        className="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        autoComplete="off"
                        type="text"
                        name="filter"
                        value={values.filter}
                        onChange={handleChange}
                        placeholder="Search…"
                    />
                    <button
                        type="button"
                        onClick={reset}
                        className="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        <div className="flex gap-2">Reset</div>
                    </button>
                </div>
            </div>
        </div>
    );
};
