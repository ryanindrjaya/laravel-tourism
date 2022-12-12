import React, { useRef } from "react";
import CardList from "./CardList";
import { motion } from "framer-motion";
import Card from "./Card";
import ScrollContainer from "react-indiana-drag-scroll";

export default function Destinasi({ data }) {
    return (
        <div className="relative z-10">
            <div className="py-48 w-full relative z-20">
                <div className="h-full pl-16 w-1/12 flex gap-x-2 mb-2 items-center">
                    <div className="w-4/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                    <div className="w-6/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                </div>
                <h1 className="pl-16 font-heading font-semibold text-2xl mb-3">
                    Beberapa Destinasi yang <br />
                    Menarik untuk dikunjungi
                </h1>
                <ScrollContainer className="overflow-scroll flex gap-x-7 pt-20 pb-6 scroll-m-5 snap-x pl-16">
                    {data?.map((item) => (
                        <Card
                            title={item.name}
                            type={"tempat"}
                            text={item.desc}
                            image={item.image}
                            id={item.id}
                        />
                    )) || "Loading..."}
                </ScrollContainer>
            </div>
            <img
                src="/vector/circle.png"
                className="absolute top-24 -left-72 z-0"
            />
            <img
                src="/vector/Ellipse 5.svg"
                className="absolute top-14 -left-64 z-0"
            />
            <motion.img
                initial={{ offsetDistance: "0%" }}
                animate={{ offsetDistance: "100%" }}
                transition={{ duration: 20, yoyo: Infinity, ease: "easeInOut" }}
                src="/vector/kotakorange.png"
                className="kotak-jalan absolute top-14 -left-64 z-10"
            />
        </div>
    );
}
