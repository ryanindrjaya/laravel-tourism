import React, { useState } from "react";
import { AnimatePresence, motion } from "framer-motion";

export default function MenuItem({
    icon,
    title,
    onClick,
    key,
    subCat,
    isOpen,
    onSearch,
}) {
    const [selected, setSelected] = useState();
    return (
        <>
            <motion.div
                key={key}
                className="w-full flex flex-col rounded-md shadow-md"
            >
                <motion.div
                    onClick={onClick}
                    initial={false}
                    animate={{
                        backgroundColor: isOpen ? "#FF6F28" : "#FFFFFF",
                        color: isOpen ? "#FFFFFF" : "#000000",
                    }}
                    className="flex py-3 cursor-pointer lg:px-5 rounded-t-md gap-x-2 items-center "
                >
                    <i className={`${icon} text-xl`}></i>
                    <p className="text-sm font-normal font-heading">{title}</p>
                </motion.div>

                <AnimatePresence>
                    {isOpen && (
                        <motion.div
                            initial={{
                                height: 0,
                                opacity: 0,
                            }}
                            animate={{
                                height: "auto",
                                opacity: 1,
                                transition: {
                                    height: {
                                        duration: 0.4,
                                    },
                                    opacity: {
                                        duration: 0.25,
                                        delay: 0.15,
                                    },
                                },
                            }}
                            exit={{
                                height: 0,
                                opacity: 0,
                                transition: {
                                    height: {
                                        duration: 0.4,
                                    },
                                    opacity: {
                                        duration: 0.25,
                                    },
                                },
                            }}
                        >
                            {subCat.map((item) => (
                                <motion.a
                                    onClick={() => {
                                        onSearch(item.category, item.name);
                                        setSelected(item.id);
                                    }}
                                    key={item.id}
                                    className={`w-full cursor-pointer flex hover:bg-gray-100 ${
                                        selected === item.id
                                            ? "bg-gray-100"
                                            : ""
                                    } duration-100 gap-x-2 items-center py-3 lg:px-5`}
                                >
                                    <i className={`${item.icon} text-xl`}></i>
                                    <p className="text-sm font-normal font-heading">
                                        {item.name}
                                    </p>
                                </motion.a>
                            ))}
                        </motion.div>
                    )}
                </AnimatePresence>
            </motion.div>
        </>
    );
}
