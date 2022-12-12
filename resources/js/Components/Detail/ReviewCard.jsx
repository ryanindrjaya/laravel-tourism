import React from "react";

export default function ReviewCard({ title, text, image, type, id }) {
    function truncate(str, n) {
        return str.length > n ? str.slice(0, n - 1) + "..." : str;
    }
    return (
        <div className="bg-white scroll-ml-16 snap-start justify-self-stretch w-2/5 h-80 shadow-md px-6 py-4 rounded-lg">
            <div className="w-full mt-2">
                <div className="flex gap-x-3 items-center">
                    <img
                        src={`/img/default.jpg`}
                        className="w-20 h-20 object-cover rounded-md"
                    />
                    <h1 className="font-bold text-base font-heading">
                        {title}
                    </h1>
                </div>
                <div className="h-full w-1/3 mt-3 flex gap-x-2 items-center">
                    <div className="w-4/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                    <div className="w-6/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                    <div className="w-2/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                </div>
                <div className="h-28 mt-1 overflow-hidden">
                    <p className="font-normal text-lg  font-heading leading-loose">
                        {truncate(text, 90)}
                    </p>
                </div>
            </div>
        </div>
    );
}
