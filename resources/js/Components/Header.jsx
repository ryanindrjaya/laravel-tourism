import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React from "react";
import NavItem from "./Nav/NavItem";

export default function Header() {
    return (
        <div className="w-full flex justify-between gap-x-28 items-center absolute top-0 px-16 py-3 z-50 bg-gradient-to-b from-[#23A6F0CC]/60 to-white/60">
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
                        icon={<i class="fas fa-car"></i>}
                        title="Beranda"
                        href="/"
                        active
                    />
                    <NavItem
                        icon={<i class="fas fa-suitcase-rolling"></i>}
                        title="Destinasi"
                        href="/destinasi"
                    />
                    <NavItem
                        icon={<i class="fas fa-thumbs-up"></i>}
                        title="Ekonomi Kreatif"
                        href="/ekonomi-kreatif"
                    />
                    <NavItem
                        icon={<i class="fas fa-suitcase-rolling"></i>}
                        title="Destinasi"
                        href="/destinasi"
                    />
                    <NavItem
                        icon={<i class="fas fa-suitcase-rolling"></i>}
                        title="Destinasi"
                        href="/destinasi"
                    />
                </ul>
                <div>
                    <i class="fas fa-search text-2xl text-gray-500 cursor-pointer"></i>
                </div>
            </div>
        </div>
    );
}
