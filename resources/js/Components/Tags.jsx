import Multiselect from "multiselect-react-dropdown";
import React from "react";

export default function Tags({ onChange, error, options }) {
    return (
        <div className="w-full mb-4">
            <span className="py-1 px-5 relative z-30 text-center text-white bg-[#23A6F0] rounded-t-lg">
                Tags
            </span>
            <div className="w-full bg-white relative z-20 rounded-lg shadow-md">
                <Multiselect
                    options={options}
                    displayValue="name"
                    onSelect={onChange}
                    onRemove={onChange}
                    placeholder="Pilih tags"
                    className="w-full px-4 py-2 text-md rounded-xl border-none outline-none focus:outline-none"
                />
                {error && (
                    <p className="text-center py-2 bg-red-200 text-red-700">
                        {error}
                    </p>
                )}
            </div>
        </div>
    );
}
