import { motion, AnimateSharedLayout } from "framer-motion";
import React, { useEffect, useState } from "react";

export default function CardEventItem({
    isOdd = "",
    image,
    name,
    onCollapse,
    onExpand,
    data,
    isExpanded,
}) {
    const collapseItem = () => {
        onCollapse();
    };

    const expandItem = () => {
        onExpand();
    };

    function truncate(str, n) {
        return str.length > n ? str.slice(0, n - 1) + "..." : str;
    }

    const collapsedCard = `lg:w-1/4 w-full h-[450px] ${isOdd} bg-white rounded-2xl shadow-lg hover:shadow-md cursor-pointer p-6`;

    return (
        <>
            <motion.div
                className="fixed h-full w-full in left-0 top-0 bg-black opacity-0 pointer-events-none"
                animate={{ opacity: isExpanded ? 0.3 : 0 }}
            />
            <AnimateSharedLayout>
                {isExpanded ? (
                    <motion.div
                        layoutId="expandable-card"
                        // onClick={collapseItem}
                        className={`w-full lg:w-5/6 h-screen lg:absolute fixed inset-0 m-auto z-[60] ${isOdd} overflow-scroll bg-white rounded-2xl shadow-lg hover:shadow-md px-12 lg:px-24 py-44 lg:py-16`}
                        layout
                    >
                        <div className="w-full h-[200px] lg:h-[634px] absolute inset-0">
                            <div className="relative w-full h-full">
                                <img
                                    src="/vector/blob.png"
                                    className="absolute z-10 top-5 right-16"
                                />
                                <img
                                    src="/vector/blob2.png"
                                    className="absolute z-10 -bottom-1 lg:-bottom-10 left-7 lg:left-16"
                                />
                                <i
                                    onClick={collapseItem}
                                    className="fas fa-close absolute top-32 lg:top-3 right-5 text-3xl cursor-pointer"
                                ></i>
                            </div>
                        </div>
                        <div className="h-auto lg:h-[570px] w-full lg:overflow-scroll relative z-20">
                            <img
                                className="rounded-md relative z-30 w-full h-auto shadow-md"
                                src={`/img/acara/${image}`}
                            />
                        </div>
                        <h1 className="font-bold font-heading relative z-30 text-2xl mt-7">
                            {data.name}
                        </h1>
                        <div className="pr-16 w-1/2 lg:w-3/12 flex gap-x-2 mt-2 mb-4 items-center">
                            <div className="w-4/12 h-2 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-6/12 h-2 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-2/12 h-2 bg-[#B9EAA8] rounded-md"></div>
                        </div>
                        <h1 className="font-medium text-2xl my-3 font-heading">
                            Deskripsi
                        </h1>
                        <p className="font-heading text-lg">{data.desc}</p>
                        <h1 className="font-medium text-2xl my-3 font-heading">
                            Operasional
                        </h1>
                        <div className="flex flex-col gap-y-3 ml-11">
                            <div className="flex items-center gap-x-2">
                                <img
                                    src="/vector/bulletPyramid.png"
                                    className="w-4"
                                    alt=""
                                />
                                <p className="font-heading text-lg">
                                    Tanggal mulai : {data.start}
                                </p>
                            </div>
                            <div className="flex items-center gap-x-2">
                                <img
                                    src="/vector/bulletPyramid.png"
                                    className="w-4"
                                    alt=""
                                />
                                <p className="font-heading text-lg">
                                    Tanggal selesai : {data.end}
                                </p>
                            </div>
                        </div>
                        <a
                            href={`/acara/${data.id}`}
                            className="w-full flex justify-end"
                        >
                            <button className="bg-[#23A6F0] text-white font-bold font-heading text-lg px-6 py-2 rounded-md mt-10">
                                Lihat Detail
                            </button>
                        </a>
                    </motion.div>
                ) : (
                    <motion.div
                        layoutId="expandable-card"
                        onClick={expandItem}
                        className={collapsedCard}
                        layout
                    >
                        <img
                            className="object-cover object-center rounded-md w-full h-4/5"
                            src={`/img/acara/${image}`}
                        />
                        <div className="h-16 mt-2 overflow-hidden">
                            <p className="font-medium text-lg font-heading">
                                {truncate(name, 90)}
                            </p>
                        </div>
                    </motion.div>
                )}
            </AnimateSharedLayout>
        </>
    );
}
