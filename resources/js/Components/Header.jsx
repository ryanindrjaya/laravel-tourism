import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React from "react";
import NavItem from "./Nav/NavItem";
import { motion } from "framer-motion";

export default function Header() {
    return (
        <motion.div
            initial={{ opacity: 0, y: -90 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 1, ease: "easeInOut" }}
            className="w-full flex justify-between gap-x-28 items-center absolute top-0 px-16 py-3 z-30 bg-gradient-to-b from-[#23A6F0CC]/60 to-white/30"
        >
            <div className="flex items-center">
                <img
                    src="/img/logo-disbudpar.svg"
                    className="h-12"
                    alt="Logo Disbudpar"
                />
                <div className="ml-4">
                    <h1 className="text-white font-heading font-bold text-xl">
                        Pemerintah Kota
                    </h1>
                    <h1 className="text-white font-heading font-bold text-xl">
                        Salatiga
                    </h1>
                </div>
            </div>
            <div className="flex items-center gap-x-10">
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
        </motion.div>
    );
}
