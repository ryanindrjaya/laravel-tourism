import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React, { useState } from "react";
import NavItem from "./Nav/NavItem";
import { AnimatePresence, motion } from "framer-motion";

export default function Header() {
    const [open, setOpen] = useState(false);
    return (
        <motion.div className="w-full flex justify-between gap-x-28 items-center absolute top-0 px-6 lg:px-16 py-3 z-[200] bg-gradient-to-b from-[#23A6F0CC]/60 to-white/30">
            <div className="flex lg:items-center">
                <img
                    src="/img/logo-disbudpar.svg"
                    className="h-8 lg:h-12"
                    alt="Logo Disbudpar"
                />
                <div className="ml-2 lg:ml-4">
                    <h1 className="text-white font-heading font-bold text-md lg:text-xl">
                        Pemerintah Kota
                    </h1>
                    <h1 className="text-white font-heading font-bold text-md lg:text-xl">
                        Salatiga
                    </h1>
                </div>
            </div>
            <div className="hidden items-center gap-x-10 lg:flex">
                <ul className="flex items-center">
                    <NavItem
                        icon={<i class="fas fa-home"></i>}
                        title="Beranda"
                        href="/"
                        active
                    />
                    <NavItem
                        icon={<i class="fas fa-map-pin"></i>}
                        title="Tempat"
                        href="/cari"
                    />
                    <NavItem
                        icon={<i class="fas fa-calendar-alt"></i>}
                        title="Acara"
                        href="/fullcalender"
                    />
                </ul>
                <div>
                    <i class="fas fa-search text-2xl text-gray-100 cursor-pointer"></i>
                </div>
            </div>
            <i
                onClick={() => setOpen(!open)}
                className="fas fa-bars text-2xl lg:hidden text-white cursor-pointer"
            ></i>
            <AnimatePresence>
                {open && (
                    <motion.div
                        initial={{
                            opacity: 0,
                            y: -90,
                        }}
                        animate={{
                            opacity: 1,
                            y: 0,
                        }}
                        exit={{
                            opacity: 0,
                        }}
                        className={`fixed top-0 left-0 w-screen h-screen bg-white z-[200]`}
                    >
                        <div className="flex justify-end items-center h-16 px-6">
                            <i
                                onClick={() => setOpen(!open)}
                                className="fas fa-times text-3xl text-gray-500 cursor-pointer mr-3"
                            ></i>
                        </div>
                        <ul className="flex flex-col items-center">
                            <NavItem
                                icon={<i class="fas fa-home"></i>}
                                title="Beranda"
                                href="/"
                                mobile
                            />
                            <NavItem
                                icon={<i class="fas fa-map-pin"></i>}
                                title="Tempat"
                                href="/cari"
                                mobile
                            />
                            <NavItem
                                icon={<i class="fas fa-calendar-alt"></i>}
                                title="Acara"
                                href="/fullcalender"
                                mobile
                            />
                        </ul>
                    </motion.div>
                )}
            </AnimatePresence>
        </motion.div>
    );
}
