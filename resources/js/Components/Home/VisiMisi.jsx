import React from "react";
import VisiMisiIcon from "./VisiMisiIcon";
import VisiMisiText from "./VisiMisiText";
import { motion } from "framer-motion";

export default function VisiMisi() {
    return (
        <motion.div
            id="visimisi"
            initial={{ opacity: 0, y: -90 }}
            whileInView={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: 90 }}
            transition={{ duration: 1, ease: "easeInOut" }}
            className="-mb-10 relative z-20 mt-40 lg:mt-72 px-7 lg:px-32"
        >
            <h1 className="font-heading font-semibold text-2xl mb-3">
                Visi & Misi
            </h1>
            <div className="bg-[#23A6F0] hidden font-heading py-12 px-28 rounded-xl lg:grid grid-cols-5">
                <VisiMisiIcon icon={<img src="/vector/Object.png" />} />
                <VisiMisiIcon connector />
                <VisiMisiIcon icon={<img src="/vector/Gear.png" />} />
                <VisiMisiIcon connector />
                <VisiMisiIcon icon={<img src="/vector/bumi.png" />} />
                <VisiMisiText
                    title={"Rencana Kerja"}
                    text={
                        "Proses yang berorientasi pada hasil yang ingin dicapai selama kurun waktu 1 (satu) atau 2 (dua) tahun kedepan dengan tetap memperhatikan potensi, peluang dan kendla yang ada, atau yang mungkin timbul nantinya. "
                    }
                />
                <VisiMisiText title={""} />
                <VisiMisiText
                    title={"Visi dan Misi"}
                    text={
                        <p>
                            Visi : "Salatiga HATI BERIMAN yang SMART" <br />{" "}
                            Misi : mewujudkan lingkunagn yang tentram, damai,
                            adil dalam gender dan usia, sehat dan kondusif dalam
                            situasi apapun. Mengembangkan ekonomi masyarakat
                            pada khususnya UMKM di kota Salatiga. Dan juga
                            meningkatkan kualitas pelayanan Pendidikan,
                            Kesehatan dan public agar menciptakan masyarakat
                            yang berpendidikan dan memiliki pemerintahan yang
                            baik.
                        </p>
                    }
                />
                <VisiMisiText title={""} />
                <VisiMisiText
                    title={"Inovasi"}
                    text={
                        "Membuat terobosan yang berbeda dari yang lain dan yang sudah ada sebelumnya, memecahkan masalah secara kreatif sehingga menciptakan sebuah pelayanan yang prima."
                    }
                />
            </div>
            <div className="lg:hidden flex flex-col gap-y-6">
                <div className="w-full flex flex-col font-heading py-12 px-28 rounded-xl bg-[#23A6F0]">
                    <VisiMisiIcon icon={<img src="/vector/Object.png" />} />
                    <VisiMisiText
                        title={"Rencana Kerja"}
                        text={
                            "Proses yang berorientasi pada hasil yang ingin dicapai selama kurun waktu 1 (satu) atau 2 (dua) tahun kedepan dengan tetap memperhatikan potensi, peluang dan kendla yang ada, atau yang mungkin timbul nantinya. "
                        }
                    />
                </div>
                <div className="w-full flex flex-col font-heading py-12 px-28 rounded-xl bg-[#23A6F0]">
                    <VisiMisiIcon icon={<img src="/vector/Gear.png" />} />{" "}
                    <VisiMisiText
                        title={"Visi dan Misi"}
                        text={
                            <p>
                                Visi : "Salatiga HATI BERIMAN yang SMART" <br />{" "}
                                Misi : mewujudkan lingkunagn yang tentram,
                                damai, adil dalam gender dan usia, sehat dan
                                kondusif dalam situasi apapun. Mengembangkan
                                ekonomi masyarakat pada khususnya UMKM di kota
                                Salatiga. Dan juga meningkatkan kualitas
                                pelayanan Pendidikan, Kesehatan dan public agar
                                menciptakan masyarakat yang berpendidikan dan
                                memiliki pemerintahan yang baik.
                            </p>
                        }
                    />
                </div>
                <div className="w-full flex flex-col font-heading py-12 px-28 rounded-xl bg-[#23A6F0]">
                    <VisiMisiIcon icon={<img src="/vector/bumi.png" />} />
                    <VisiMisiText
                        title={"Inovasi"}
                        text={
                            "Membuat terobosan yang berbeda dari yang lain dan yang sudah ada sebelumnya, memecahkan masalah secara kreatif sehingga menciptakan sebuah pelayanan yang prima."
                        }
                    />
                </div>
            </div>
        </motion.div>
    );
}
