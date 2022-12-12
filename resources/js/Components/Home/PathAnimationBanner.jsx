import React from "react";
import { motion } from "framer-motion";

export default function PathAnimationBanner() {
    const transition = { duration: 14, yoyo: Infinity, ease: "easeInOut" };

    return (
        <div className="container relative">
            <motion.img
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ duration: 1, ease: "easeInOut", delay: 0.5 }}
                src="/vector/Polygon 1.png"
                className="absolute left-0 -top-24 w-screen z-0"
            />
            <svg
                className="absolute top-24 left-0 z-0"
                viewBox="0 0 1140 575"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <g filter="url(#filter0_f_79_5)">
                    <path
                        d="M1144 5L286.431 565.075C277.495 570.911 266.132 571.561 256.59 566.781L2.5 439.5"
                        stroke="black"
                    />
                </g>
                <defs>
                    <filter
                        id="filter0_f_79_5"
                        x="-1.72394"
                        y="0.581421"
                        width="1150"
                        height="573.876"
                        filterUnits="userSpaceOnUse"
                        color-interpolation-filters="sRGB"
                    >
                        <feFlood
                            flood-opacity="0"
                            result="BackgroundImageFix"
                        />
                        <feBlend
                            mode="normal"
                            in="SourceGraphic"
                            in2="BackgroundImageFix"
                            result="shape"
                        />
                        <feGaussianBlur
                            stdDeviation="2"
                            result="effect1_foregroundBlur_79_5"
                        />
                    </filter>
                </defs>
            </svg>
            <svg
                className="absolute top-36 left-0 z-0"
                viewBox="0 0 1140 575"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <g filter="url(#filter0_f_79_5)">
                    <path
                        d="M1144 5L286.431 565.075C277.495 570.911 266.132 571.561 256.59 566.781L2.5 439.5"
                        stroke="black"
                    />
                </g>
                <defs>
                    <filter
                        id="filter0_f_79_5"
                        x="-1.72394"
                        y="0.581421"
                        width="1150"
                        height="573.876"
                        filterUnits="userSpaceOnUse"
                        color-interpolation-filters="sRGB"
                    >
                        <feFlood
                            flood-opacity="0"
                            result="BackgroundImageFix"
                        />
                        <feBlend
                            mode="normal"
                            in="SourceGraphic"
                            in2="BackgroundImageFix"
                            result="shape"
                        />
                        <feGaussianBlur
                            stdDeviation="2"
                            result="effect1_foregroundBlur_79_5"
                        />
                    </filter>
                </defs>
            </svg>

            <motion.img
                className="bola-jalan absolute -bottom-72 -rotate-3 left-36"
                src="/vector/bolakuning.png"
                initial={{ offsetDistance: "0%", rotate: 0 }}
                animate={{ offsetDistance: "100%", rotate: 360 }}
                transition={transition}
            />
            <motion.img
                className="bola-jalan2 absolute -bottom-72 rotate-6 left-12"
                src="/vector/kotakorange.png"
                initial={{ offsetDistance: "0%" }}
                animate={{ offsetDistance: "100%" }}
                transition={transition}
            />
        </div>
    );
}
