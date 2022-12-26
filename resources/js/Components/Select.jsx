import React from "react";

export default function Select({
    name,
    label,
    options,
    onChange,
    error,
    onSelect,
    multiple = false,
}) {
    return (
        <div
            className={`${
                label !== "Tags" ? "w-full lg:w-1/2" : "w-full"
            } mb-4`}
        >
            <span className="py-1 px-5 relative z-30 text-center text-white bg-[#23A6F0] rounded-t-lg">
                {label}
            </span>
            <div className="w-full bg-white relative z-20 rounded-lg shadow-md">
                <select
                    onChange={onChange}
                    name={name}
                    id={name}
                    multiple={multiple}
                    className="w-full px-4 py-2 text-md rounded-xl border-none focus:outline-none"
                >
                    {options.length > 0 ? (
                        options.map((option, idx) => (
                            <option key={idx} value={option.name}>
                                {option.name}
                            </option>
                        ))
                    ) : (
                        <option selected disabled hidden>
                            Silahkan pilih kecamatan
                        </option>
                    )}
                </select>
                {error && (
                    <p className="text-center py-2 bg-red-200 text-red-700">
                        {error}
                    </p>
                )}
            </div>
        </div>
    );
}
