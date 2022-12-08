import React, { useEffect } from "react";
import { motion } from "framer-motion";

export default function HeroBanner() {
    const idleMovementVariants = {
        idle1: {
            x: [0, 12, 0.1, -10, 0],
            y: [0, -11, 0.4, 10, 0],
            transition: {
                duration: 6,
                ease: "easeInOut",
                times: [0, 0.25, 0.5, 0.75, 1],
                repeat: Infinity,
                repeatDelay: 0,
            },
        },
        idle2: {
            x: [0, 12, 0, 12, 0],
            y: [0, -5, 0, -5, 0],
            transition: {
                duration: 5,
                ease: "easeInOut",
                times: [0, 0.25, 0.5, 0.75, 1],
                repeat: Infinity,
                repeatDelay: 0,
            },
        },
        idle3: {
            x: [0, 5, 0],
            y: [0, 8, 10, 0, 8, 10, 0],
            transition: {
                duration: 5,
                ease: "easeInOut",
                repeat: Infinity,
                repeatDelay: 0,
            },
        },
    };

    return (
        <div className="relative mt-20 z-40 flex flex-col w-full h-screen items-center text-white justify-center">
            <h1 className="font-heading z-20 mb-11 font-bold text-center text-xl">
                SALATIGA HATI <br />
                BERIMAN
            </h1>
            <h1 className="font-semibold mb-5 text-center font-heading z-20 text-5xl">
                Dinas Kebudayaan dan <br />
                Pariwisata
            </h1>
            <h1 className="font-light text-center font-heading z-20 text-5xl">
                Kota Salatiga
            </h1>
            <p className="text-white cursor-pointer hover:bg-blue-700 duration-150 z-20 bg-[#23A6F0] px-8 py-2 mt-10 rounded-lg">
                Mulai
            </p>
            <div className="absolute top-1/2 right-1/4 transform z-10 translate-x-1/4 -translate-y-1/2 w-[462px] h-[516px] bg-[#FBB52F] rounded-[50px] gap-x-5">
                <div className="relative w-full h-full">
                    <img
                        src="/vector/3dheader1.png"
                        className="absolute right-20 -bottom-10"
                    />
                </div>
            </div>

            <motion.img
                variants={idleMovementVariants}
                animate="idle1"
                src="/vector/kotakbiru.png"
                className="absolute top-1/2 left-1/4 transform z-10 -translate-x-1/4 -translate-y-1/2 w-[462px]6px"
            />
            <motion.img
                variants={idleMovementVariants}
                animate="idle2"
                src="/vector/bolakuning.png"
                className="absolute bottom-1/4 left-1/4 transform z-10 -translate-x-1/4 -translate-y-1/2 w-[462px]6px"
            />
            <motion.img
                variants={idleMovementVariants}
                animate="idle3"
                src="/vector/kotakorange.png"
                className="absolute bottom-1/4 left-1/3 transform z-10 -translate-x-1/4 -translate-y-1/2 w-[462px]6px"
            />
        </div>
    );
}
