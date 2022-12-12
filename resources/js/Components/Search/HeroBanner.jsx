import React from "react";
import EarthAnimation from "./EarthAnimation";
import { motion, useMotionValue, useTransform } from "framer-motion";

export default function HeroBanner() {
    const x = useMotionValue(0);
    const y = useMotionValue(0);

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

    const rotateX = useTransform(y, [0, 1500], [8, -8]);
    const rotateY = useTransform(x, [0, 1500], [-8, 8]);

    function handleMouse(event) {
        x.set(event.pageX);
        y.set(event.pageY);
    }

    function handleMouseLeave() {
        x.set(0);
        y.set(0);
    }

    return (
        <div className="relative z-10 flex flex-col w-full mb-28 h-screen px-28 items-center text-white justify-center">
            <img
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ duration: 1, ease: "easeInOut", delay: 0.5 }}
                src="/vector/Vector.png"
                className="absolute left-0 top-0 w-screen z-0"
            />
            <div className="flex gap-x-3 w-full">
                <div className="w-1/2">
                    <EarthAnimation
                        onMouseMove={handleMouse}
                        onMouseLeave={handleMouseLeave}
                        className="relative z-20 w-[600px] h-[600px]"
                    >
                        <motion.img
                            initial={{ opacity: 0 }}
                            animate={{ opacity: 1 }}
                            transition={{
                                duration: 0.5,
                                ease: "easeInOut",
                                delay: 1,
                            }}
                            style={{ x: rotateX, y: rotateY }}
                            src="/vector/search/bumiSearch.svg"
                            // className="absolute top-1/2 z-40 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                        />
                    </EarthAnimation>
                </div>
                <div className="w-1/2 relative font-heading text-white flex flex-col justify-center text-4xl -ml-16 z-10 h-full">
                    <h1 className="font-bold text-white">Daftar Tempat</h1>
                    <h1 className="font-normal text-white">
                        Jelajahi Berbagai Tempat
                        <br /> Di Salatiga
                    </h1>
                    <motion.img
                        variants={idleMovementVariants}
                        animate="idle1"
                        src="/vector/kotakbiru.png"
                        className="absolute top-3/4 left-4 transform z-10 -translate-x-1/4 -translate-y-1/2"
                    />
                    <motion.img
                        variants={idleMovementVariants}
                        animate="idle2"
                        src="/vector/bolakuning.png"
                        className="absolute -bottom-4 left-0 transform z-10 -translate-x-1/4 -translate-y-1/2"
                    />
                    <motion.img
                        variants={idleMovementVariants}
                        animate="idle3"
                        src="/vector/kotakorange.png"
                        className="absolute -bottom-28 left-[10%] transform z-10 -translate-x-1/4 -translate-y-1/2"
                    />
                    <img
                        src="/vector/Man Pose.png"
                        className="absolute -bottom-10 lg:scale-150 left-1/2 transform -translate-x-1/2 "
                    />
                </div>
            </div>
        </div>
    );
}
