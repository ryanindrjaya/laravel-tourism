import React from "react";
import { motion } from "framer-motion";

export default function TempatCard({
    title,
    kategori,
    deskripsi,
    image,
    id,
    idx,
    ...props
}) {
    function truncate(str, n) {
        return str.length > n ? str.slice(0, n - 1) + "..." : str;
    }

    const firstFive = [0, 1, 2, 3, 4];

    return (
        <motion.div
            viewport={{ once: true }}
            initial={
                firstFive.includes(idx)
                    ? {
                          opacity: 0,
                          y: 50,
                      }
                    : {
                          opacity: 0,
                          y: 50,
                      }
            }
            whileInView={{
                opacity: 1,
                y: 0,
                transition: {
                    duration: 0.7,
                },
            }}
            className="bg-white rounded-2xl shadow-sm flex gap-x-5 min-h-[200px]"
        >
            <img
                src={`/img/tempat/${image}`}
                alt=""
                className="w-1/4 object-cover object-center shadow-none rounded-2xl"
            />
            <div className="font-heading flex-1 pr-9 py-3">
                <h1 className="font-bold text-base">{title}</h1>
                <h1>({kategori})</h1>
                {/* garis" an */}
                <div className="h-2 my-1 w-2/12 flex gap-x-1 items-center">
                    <div className="w-4/12 h-2 bg-[#D9D9D9] rounded-md"></div>
                    <div className="w-6/12 h-2 bg-[#D9D9D9] rounded-md"></div>
                    <div className="w-2/12 h-2 bg-[#D9D9D9] rounded-md"></div>
                </div>{" "}
                <p className="text-sm h-20">{truncate(deskripsi, 200)}</p>
                <div className="w-full flex justify-end">
                    <a
                        href={`/tempat/${id}`}
                        className="font-bold cursor-pointer px-3 py-2 rounded-md text-white bg-[#23A6F0]"
                    >
                        Details
                    </a>
                </div>
            </div>
        </motion.div>
    );
}
