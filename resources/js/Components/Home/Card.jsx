import React from "react";

export default function Card({ title, text, image, type, id }) {
    function truncate(str, n) {
        return str.length > n ? str.slice(0, n - 1) + "..." : str;
    }
    return (
        <div className="bg-white scroll-ml-16 group snap-start justify-self-stretch flex-grow min-w-[26rem] h-80 shadow-md px-6 py-4 rounded-md">
            <div className="w-full group flex justify-center">
                <img
                    src={`/img/${type}/${image}`}
                    className="flex-1 group-hover:scale-110 duration-200 h-40 shadow-md -mt-20 object-cover object-center rounded-md"
                />
            </div>
            <div className="w-full mt-2">
                <h1 className="font-bold text-base font-heading">{title}</h1>
                <div className="h-full w-1/3 mt-2 flex gap-x-2 items-center">
                    <div className="w-4/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                    <div className="w-6/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                    <div className="w-2/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                </div>
                <div className="h-28 mt-1 overflow-hidden">
                    <p className="font-medium  font-heading leading-loose">
                        {truncate(text, 90)}
                    </p>
                </div>
                <div className="flex justify-end mt-2">
                    <a
                        href={`/tempat/${id}`}
                        className="text-white px-4 py-1 rounded-md bg-[#23A6F0]/80 hover:bg-[#23A6F0] duration-150  font-medium font-heading"
                    >
                        Detail
                    </a>
                </div>
            </div>
        </div>
    );
}
