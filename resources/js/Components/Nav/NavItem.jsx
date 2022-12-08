import React from "react";

export default function NavItem({ icon, title, href, active }) {
    return (
        <li className="">
            <a
                href={href}
                className={`flex items-center hover:text-white duration-150 gap-x-2 px-4 py-2 rounded-md text-sm ${
                    active ? "text-white" : "text-gray-500"
                }`}
            >
                {icon}
                <span className="font-semibold text-sm">{title}</span>
            </a>
        </li>
    );
}
