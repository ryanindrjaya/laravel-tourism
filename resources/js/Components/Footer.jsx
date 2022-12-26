import React from "react";
import { motion } from "framer-motion";

export default function Footer() {
    return (
        <div className="w-full z-40 h-60 bg-[#252B42]">
            <div className="lg:max-w-5xl z-50 mx-auto relative">
                <div className="w-4/5 lg:w-full absolute -top-10 left-[45%] transform -translate-x-1/2 py-3 px-11 flex justify-between bg-[#DDDDDD] rounded-md">
                    <div className="flex items-center">
                        <div className="ml-4">
                            <h1 className="text-[#DDDDDD] font-heading font-bold text-xl">
                                Pemerintah Kota
                            </h1>
                            <h1 className="text-[#DDDDDD] font-heading font-bold text-xl">
                                Salatiga
                            </h1>
                        </div>
                    </div>
                </div>
                <div className="w-4/5 lg:w-full absolute -top-5 left-[50%] transform -translate-x-1/2 py-3 px-4 lg:px-11 flex justify-between bg-[#23A6F0] rounded-md">
                    <div className="flex w-1/2 items-center">
                        <img
                            src="/img/logo-disbudpar.svg"
                            className="h-8 lg:h-12"
                            alt="Logo Disbudpar"
                        />
                        <div className="ml-4">
                            <h1 className="text-white font-heading font-bold text-md lg:text-xl">
                                Pemerintah Kota
                            </h1>
                            <h1 className="text-white font-heading font-bold text-md lg:text-xl">
                                Salatiga
                            </h1>
                        </div>
                    </div>
                    <motion.a
                        href="/add-place"
                        initial={{ scale: 1 }}
                        whileHover={{ scale: 1.1 }}
                        className="w-1/4 cursor-pointer flex justify-end"
                    >
                        <div className="font-bold relative text-white bg-[#252B42] text-center flex items-center rounded-2xl py-1 pl-6 pr-4">
                            <span className="lg:text-lg lg:inline hidden text-sm">
                                Tambah tempat anda disini
                            </span>
                            <span className="lg:text-lg inline lg:hidden text-sm">
                                Tambah tempat
                            </span>
                            <img
                                src="/vector/map.svg"
                                className="absolute scale-125 lg:scale-150 top-1/2 transform -left-9 lg:-left-11 -translate-y-1/2"
                            />
                        </div>
                    </motion.a>
                </div>
                <div className="pt-24 lg:px-0 px-10 grid grid-cols-12 gap-x-8">
                    <div className="col-span-3">
                        <h1 className="font-bold text-white text-lg lg:text-2xl mb-2">
                            Butuh Bantuan?
                        </h1>
                        <div className="w-full flex gap-x-2 mb-3 items-center">
                            <div className="w-2/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-5/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-1/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-4/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                        </div>
                        <div className="w-full flex gap-x-2 mb-3 items-center">
                            <div className="w-5/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-2/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-4/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-1/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                        </div>
                        <div className="w-full flex gap-x-2 mb-3 items-center">
                            <div className="w-1/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-4/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-5/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                            <div className="w-2/12 h-1 bg-[#B9EAA8] rounded-md"></div>
                        </div>
                    </div>
                    <div className="col-span-7 h-full flex flex-col justify-around ">
                        <a
                            href="tel://089524621666"
                            className="flex h-7 items-center gap-x-3 text-base text-white font-semibold"
                        >
                            <i class="fa-solid fa-phone-volume"></i>
                            <p>+62 895 2462 1666</p>
                        </a>
                        <a
                            target="_blank"
                            href="https://api.whatsapp.com/send/?phone=6281225951789&text&type=phone_number&app_absent=0"
                            className="flex h-7 items-center gap-x-3 text-base text-white font-semibold"
                        >
                            <i class="fa-solid fa-phone-volume"></i>
                            <p>+62 895 2462 1666 (WA)</p>
                        </a>
                        <a
                            href="mailto:help@dolansalatiga.com"
                            className="flex h-7 items-center gap-x-3 text-base text-white font-semibold"
                        >
                            <i class="fa-solid fa-envelope"></i>
                            <p>help@dolansalatiga.com</p>
                        </a>
                    </div>
                    <div className="col-span-2 grid grid-cols-2 text-lg text-white gap-x-6 gap-y-4">
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-vine"></i>
                        <i class="fab fa-pinterest"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
        </div>
    );
}
