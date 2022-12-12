import React from "react";
import CardEvents from "./CardEvents";
import { motion } from "framer-motion";

export default function Event({ data }) {
    return (
        <div className="pb-[28rem] w-full relative z-40">
            <div className="flex relative z-40 flex-col w-full items-end justify-end">
                <div className="h-full pr-16 w-1/12 flex gap-x-2 mb-2 items-center">
                    <div className="w-4/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                    <div className="w-6/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                </div>
                <h1 className="pr-16 font-heading text-end font-semibold text-2xl mb-3">
                    Ikuti Event Menarik <br />
                    <span className="font-normal">
                        Beragam Acara untuk Diikuti
                    </span>
                </h1>
            </div>
            <CardEvents data={data} />
            <img
                src="/vector/Rectangle 31.svg"
                className="absolute right-0 bottom-0 z-10"
            />
            <img
                src="/vector/Rectangle 32.svg"
                className="absolute right-0 bottom-0 z-10"
            />
        </div>
    );
}
