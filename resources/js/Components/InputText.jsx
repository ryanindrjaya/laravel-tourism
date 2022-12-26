import React from "react";

export default function InputText({
    label,
    placeholder,
    type,
    name,
    required = false,
    onChange,
    error,
    textArea = false,
}) {
    return (
        <div className="w-full mb-4">
            <span className="py-1 px-5 relative z-30 text-center text-white bg-[#23A6F0] rounded-t-lg">
                {label}
            </span>
            <div className="w-full bg-white relative z-20 rounded-lg shadow-md">
                {!textArea ? (
                    <input
                        onChange={onChange}
                        required={required}
                        type={type}
                        name={name}
                        id={name}
                        placeholder={placeholder}
                        className="w-full px-4 py-2 text-md rounded-xl border-none focus:outline-none"
                    />
                ) : (
                    <textarea
                        onChange={onChange}
                        required={required}
                        name={name}
                        id={name}
                        placeholder={placeholder}
                        className="w-full px-4 py-2 text-md rounded-xl border-none focus:outline-none"
                    />
                )}
                {error && (
                    <p className="text-center py-2 bg-red-200 text-red-700">
                        {error}
                    </p>
                )}
            </div>
        </div>
    );
}
