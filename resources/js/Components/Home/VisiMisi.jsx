import React from "react";
import VisiMisiIcon from "./VisiMisiIcon";
import VisiMisiText from "./VisiMisiText";

export default function VisiMisi() {
    return (
        <div className="-mb-10 relative z-20 mt-52 px-32">
            <div className="bg-[#23A6F0] font-heading py-12 px-28 rounded-xl grid grid-cols-5">
                <VisiMisiIcon
                    icon={<i class="fa-solid fa-gear text-4xl"></i>}
                />
                <VisiMisiIcon connector />
                <VisiMisiIcon
                    icon={<i class="fa-solid fa-gear text-4xl"></i>}
                />
                <VisiMisiIcon connector />
                <VisiMisiIcon
                    icon={<i class="fa-solid fa-gear text-4xl"></i>}
                />
                <VisiMisiText
                    title={"Rencana Kerja"}
                    text={
                        "  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et necessitatibus voluptatum a ut vel maxime alias quo qui reprehenderit error quisquam nam minima non itaque, ratione atque earum tenetur iure."
                    }
                />
                <VisiMisiText title={""} />
                <VisiMisiText
                    title={"Visi dan Misi"}
                    text={
                        "  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et necessitatibus voluptatum a ut vel maxime alias quo qui reprehenderit error quisquam nam minima non itaque, ratione atque earum tenetur iure."
                    }
                />
                <VisiMisiText title={""} />
                <VisiMisiText
                    title={"Inovasi"}
                    text={
                        "  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et necessitatibus voluptatum a ut vel maxime alias quo qui reprehenderit error quisquam nam minima non itaque, ratione atque earum tenetur iure."
                    }
                />
            </div>
        </div>
    );
}
