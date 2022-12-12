import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { AnimatePresence, motion } from "framer-motion";
import React from "react";
import NavItem from "./Nav/NavItem";

export default function Header() {
    return (
        <motion.div
            initial={{ y: -20 }}
            animate={{ y: 0 }}
            exit={{ y: -20 }}
            transition={{ duration: 0.3 }}
            className="w-full flex justify-between gap-x-28 items-center fixed top-0 px-16 py-3 z-50 bg-[#23a5f0] shadow-md"
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
