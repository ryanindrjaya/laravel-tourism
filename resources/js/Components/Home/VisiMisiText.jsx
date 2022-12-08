import React from "react";

export default function VisiMisiText({ title, text }) {
    return (
        <div className="w-full">
            <h1 className="text-center text-lg text-white mt-6 font-normal font-heading">
                {title}
            </h1>
            <p className="text-center text-sm text-white mt-6 font-normal">
                {text}
            </p>
        </div>
    );
}
