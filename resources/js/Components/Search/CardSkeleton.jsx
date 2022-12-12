import React from "react";
import { motion } from "framer-motion";

export default function CardSkeleton() {
    return (
        <motion.div
            initial={{
                opacity: 0,
                y: 0,
            }}
            animate={{
                opacity: 1,
            }}
            className="bg-white rounded-2xl shadow-sm flex gap-x-5 min-h-[200px]"
        >
            <div className="w-1/4 object-cover animate-pulse bg-gray-200 object-center shadow-none rounded-2xl" />
            <div className="font-heading flex flex-col animate-pulse justify-between flex-1 pr-9 py-3">
                <div className="h-2 w-1/4 bg-gray-200 rounded-full animate-pulse"></div>
                <div className="h-2 w-16 bg-gray-200 rounded-full animate-pulse"></div>
                {/* garis" an */}
                <div className="h-2 my-1 w-2/12 flex gap-x-1 items-center animate-pulse">
                    <div className="w-4/12 h-2 bg-[#D9D9D9] rounded-md"></div>
                    <div className="w-6/12 h-2 bg-[#D9D9D9] rounded-md"></div>
                    <div className="w-2/12 h-2 bg-[#D9D9D9] rounded-md"></div>
                </div>{" "}
                <div className="flex flex-col gap-y-2 animate-pulse">
                    <div className="text-sm w-full bg-gray-200 rounded-full h-2"></div>
                    <div className="text-sm w-5/12 bg-gray-200 rounded-full h-2"></div>
                    <div className="text-sm w-8/12 bg-gray-200 rounded-full h-2"></div>
                </div>
                <div className="w-full flex justify-end">
                    <a
                        // href={`/tempat/${id}`}
                        className="font-bold w-20 h-9 cursor-pointer px-3 py-2 animate-pulse rounded-md text-gray-200 bg-gray-200"
                    ></a>
                </div>
            </div>
        </motion.div>
    );
}
