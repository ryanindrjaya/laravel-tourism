import React from "react";
import { useRef } from "react";

export default function NavItem({ icon, title, href, active, mobile = false }) {
    const link = useRef();
    return (
        <li
            onClick={() => link?.current?.click()}
            className={`w-full lg:px-0 mx-28 lg:mx-0 py-11 lg:py-0 cursor-pointer lg:cursor-default duration-100 hover:bg-slate-100 lg:hover:bg-transparent`}
        >
            <a
                href={href}
                ref={link}
                className={`h-full items-center  duration-150 gap-x-2 px-4 py-2 rounded-md ${
                    mobile
                        ? "text-gray-600 hover:text-gray-500  text-2xl grid grid-cols-12"
                        : "flex text-white hover:text-gray-100 text-sm"
                }${active ? " bg-[#23A6F0CC]/60" : ""}`}
            >
                <span className="col-span-2">{icon}</span>
                <span className="font-semibold col-span-10">{title}</span>
            </a>
        </li>
    );
}
