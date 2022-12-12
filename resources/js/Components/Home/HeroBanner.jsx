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
            <motion.h1
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ duration: 1, ease: "easeInOut", delay: 2.3 }}
                className="font-heading z-20 mb-11 text-white font-bold text-center text-xl"
            >
                SALATIGA HATI <br />
                BERIMAN
            </motion.h1>
            <motion.h1
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ duration: 1, ease: "easeInOut", delay: 2.3 }}
                className="font-semibold mb-5 text-center text-white font-heading z-20 text-5xl"
            >
                Dinas Kebudayaan dan <br />
                Pariwisata
            </motion.h1>
            <motion.h1
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ duration: 1, ease: "easeInOut", delay: 2.3 }}
                className="font-light text-center text-white font-heading z-20 text-5xl"
            >
                Kota Salatiga
            </motion.h1>
            <motion.div
                initial={{ opacity: 0, y: -70 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 1, ease: "easeInOut", delay: 1.9 }}
                class="button relative z-40 mt-16 w-40 h-10 bg-blue-500 rounded-lg cursor-pointer select-none
    active:translate-y-2  active:[box-shadow:0_0px_0_0_#1b6ff8,0_0px_0_0_#1b70f841]
    active:border-b-[0px]
    transition-all duration-150 [box-shadow:0_10px_0_0_#1b6ff8,0_15px_0_0_#1b70f841]
    border-b-[1px] border-blue-400
  "
            >
                <span class="flex flex-col justify-center items-center h-full text-white font-bold text-lg ">
                    Mulai
                </span>
            </motion.div>
            <motion.div
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ duration: 1, ease: "easeInOut", delay: 0.5 }}
                className="absolute top-1/2 right-1/4 transform z-10 translate-x-1/4 -translate-y-1/2 w-[462px] h-[516px] bg-[#FBB52F] rounded-[50px] gap-x-5"
            >
                <motion.div
                    initial={{ opacity: 0, y: -90 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 1, ease: "easeInOut", delay: 1.9 }}
                    className="relative w-full h-full"
                >
                    <img
                        src="/vector/3dheader1.png"
                        className="absolute right-20 -bottom-10"
                    />
                </motion.div>
            </motion.div>

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
