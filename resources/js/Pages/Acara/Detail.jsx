import { Head } from "@inertiajs/inertia-react";
import { AnimatePresence, motion } from "framer-motion";
import { wrap } from "popmotion";
import React, { useState } from "react";
import Rating from "react-rating";
import Map from "../../Components/Detail/Map";
import Reviews from "../../Components/Detail/Reviews";
import Video from "../../Components/Detail/Video";
import MainLayout from "../../Layouts/MainLayout";

const variants = {
    enter: (direction) => {
        return {
            x: direction > 0 ? 1000 : -1000,
            opacity: 0,
        };
    },
    center: {
        zIndex: 1,
        x: 0,
        opacity: 1,
    },
    exit: (direction) => {
        return {
            zIndex: 0,
            x: direction < 0 ? 1000 : -1000,
            opacity: 0,
        };
    },
};

const idleMovementVariants = {
    idle1: {
        x: [0, 12, 0.1, -10, 0],
        y: [0, -11, 0.4, 10, 0],
        transition: {
            duration: 6,
            ease: "easeInOut",
            times: [0, 0.25, 0.5, 0.75, 1],
            repeat: Infinity,
            repeatDelay: 0,
        },
    },
    idle2: {
        x: [0, 12, 0, 12, 0],
        y: [0, -5, 0, -5, 0],
        transition: {
            duration: 5,
            ease: "easeInOut",
            times: [0, 0.25, 0.5, 0.75, 1],
            repeat: Infinity,
            repeatDelay: 0,
        },
    },
    idle3: {
        x: [0, 5, 0],
        y: [0, 8, 10, 0, 8, 10, 0],
        transition: {
            duration: 5,
            ease: "easeInOut",
            repeat: Infinity,
            repeatDelay: 0,
        },
    },
};

const swipeConfidenceThreshold = 10000;
const swipePower = (offset, velocity) => {
    return Math.abs(offset) * velocity;
};

export default function Detail({ acara }) {
    const [[page, direction], setPage] = useState([0, 0]);

    const paginate = (newDirection) => {
        setPage([page + newDirection, newDirection]);
    };

    console.log("acara =>", acara);

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString();
        var split = number_string.split(",");
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            var separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    return (
        <>
            <Head>
                <title>Detail Event | Disbudpar Salatiga</title>
            </Head>
            <MainLayout>
                <div className="w-full overflow-hidden">
                    <div className="w-full h-screen relative">
                        <img
                            src={`/img/acara/${acara?.image}`}
                            className="h-full w-full object-cover object-center"
                        />
                        <div className="w-full h-full absolute inset-0 bg-black/20 backdrop-blur-sm"></div>
                    </div>

                    <div className="bg-[#EFF5FF] pb-32 w-full">
                        <div className="max-w-5xl m-auto  relative">
                            <div className="pt-20 text-3xl font-heading ">
                                <h1 className="text-center mb-8 font-medium">
                                    Acara
                                </h1>
                                <h1 className="text-center relative z-50">
                                    {acara?.name}
                                </h1>
                                {acara.image && (
                                    <div className="example-container">
                                        <motion.img
                                            variants={idleMovementVariants}
                                            animate="idle1"
                                            src="/vector/kotakbiru.png"
                                            className="absolute top-0 left-[15%] transform z-10 -translate-x-1/4 -translate-y-1/2 w-[462px]6px"
                                        />
                                        <motion.img
                                            variants={idleMovementVariants}
                                            animate="idle2"
                                            src="/vector/bolakuning.png"
                                            className="absolute top-48 left-[19%] transform z-10 -translate-x-1/4 -translate-y-1/2 w-[462px]6px"
                                        />
                                        <motion.img
                                            variants={idleMovementVariants}
                                            animate="idle3"
                                            src="/vector/kotakorange.png"
                                            className="absolute top-32 left-[22%] transform z-10 -translate-x-1/4 -translate-y-1/2 w-[462px]6px"
                                        />
                                        <motion.img
                                            variants={idleMovementVariants}
                                            animate="idle2"
                                            src="/vector/tempat/donat.png"
                                            className="absolute bottom-8 right-[22%] transform z-10 -translate-x-1/4 -translate-y-1/2 w-[462px]6px"
                                        />
                                        <motion.img
                                            variants={idleMovementVariants}
                                            animate="idle3"
                                            src="/vector/tempat/pill.png"
                                            className="absolute bottom-0 right-[16%] transform z-10 -translate-x-1/4 -translate-y-1/2 w-[462px]6px"
                                        />
                                        <AnimatePresence
                                            initial={false}
                                            custom={direction}
                                        >
                                            <div className="image-carousel">
                                                <img
                                                    src="/vector/blob.png"
                                                    className="absolute z-0 rotate-180 -top-12 -right-24"
                                                />
                                                <img
                                                    src="/vector/blob2.png"
                                                    className="absolute z-0 rotate-[35deg] -bottom-10 -left-24"
                                                />
                                                <motion.img
                                                    key={page}
                                                    src={`/img/acara/${acara.image}`}
                                                    custom={direction}
                                                    variants={variants}
                                                    initial="enter"
                                                    className="rounded-2xl h-[70vh] relative z-30"
                                                    animate="center"
                                                    exit="exit"
                                                    transition={{
                                                        x: {
                                                            type: "spring",
                                                            stiffness: 300,
                                                            damping: 30,
                                                        },
                                                        opacity: {
                                                            duration: 0.2,
                                                        },
                                                    }}
                                                    drag="x"
                                                    dragConstraints={{
                                                        left: 0,
                                                        right: 0,
                                                    }}
                                                    dragElastic={1}
                                                    onDragEnd={(
                                                        e,
                                                        { offset, velocity }
                                                    ) => {
                                                        const swipe =
                                                            swipePower(
                                                                offset.x,
                                                                velocity.x
                                                            );

                                                        if (
                                                            swipe <
                                                            -swipeConfidenceThreshold
                                                        ) {
                                                            paginate(1);
                                                        } else if (
                                                            swipe >
                                                            swipeConfidenceThreshold
                                                        ) {
                                                            paginate(-1);
                                                        }
                                                    }}
                                                />
                                            </div>
                                        </AnimatePresence>
                                        <div
                                            className="next shadow-sm"
                                            onClick={() => paginate(1)}
                                        >
                                            <i class="fas fa-chevron-right text-2xl"></i>
                                        </div>
                                        <div
                                            className="prev shadow-sm"
                                            onClick={() => paginate(-1)}
                                        >
                                            <i class="fas fa-chevron-left text-2xl rotate-180"></i>
                                        </div>
                                    </div>
                                )}
                                <div className="w-full mt-12 mb-24 px-7 py-5 rounded-2xl bg-white shadow-md">
                                    <div className="mb-3">
                                        <h1 className="font-bold font-heading text-xl">
                                            Deskripsi :
                                        </h1>
                                        <div className="w-1/6 flex gap-x-2 my-1">
                                            <div className="w-6/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                            <div className="w-4/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                            <div className="w-2/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                        </div>
                                    </div>
                                    <p className="font-heading text-lg mb-4">
                                        {acara?.desc}
                                    </p>
                                    <div className="mb-3">
                                        <h1 className="font-bold font-heading text-xl">
                                            Operasional :
                                        </h1>
                                        <div className="w-1/6 flex gap-x-2 my-1">
                                            <div className="w-10/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                            <div className="w-2/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                        </div>
                                    </div>
                                    <div className="w-full lg:w-5/12 grid grid-cols-2 gap-x-2">
                                        <p className="font-heading col-span-1 text-lg mb-2">
                                            Tanggal Mulai
                                        </p>
                                        <p className="font-heading col-span-1 font-bold text-lg">
                                            : {acara?.start} WIB
                                        </p>
                                    </div>
                                    <div className="w-full lg:w-5/12 grid grid-cols-2 gap-x-2 mb-4">
                                        <p className="font-heading col-span-1 text-lg mb-2">
                                            Tanggal Selesai
                                        </p>
                                        <p className="font-heading col-span-1 font-bold text-lg">
                                            : {acara?.end} WIB
                                        </p>
                                    </div>
                                    <div className="mb-3">
                                        <h1 className="font-bold font-heading text-xl">
                                            Website :
                                        </h1>
                                        <div className="w-1/6 flex gap-x-2 my-1">
                                            <div className="w-2/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                            <div className="w-4/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                            <div className="w-6/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                        </div>
                                    </div>
                                    <p className="font-heading text-lg mb-4">
                                        {acara?.url || "-"}
                                    </p>
                                    <div className="w-full mb-3 relative">
                                        {acara?.video && (
                                            <Video video={acara?.video} />
                                        )}
                                    </div>

                                    <div className="w-full flex justify-center gap-x-24">
                                        <div className=" flex flex-col gap-y-2 text-2xl items-center justify-center">
                                            <i class="fas fa-ticket-alt text-[#FBB52F]"></i>
                                            <p className="text-md">
                                                Rp.{" "}
                                                {formatRupiah(acara?.ticket)}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div className="w-full mt-12 mb-24 px-7 py-5 rounded-2xl bg-white shadow-md">
                                    <div className="mb-3">
                                        <h1 className="font-bold font-heading text-xl">
                                            Lokasi :
                                        </h1>
                                        <div className="w-1/6 flex gap-x-2 my-1">
                                            <div className="w-7/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                            <div className="w-5/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                        </div>
                                    </div>
                                    <h1 className="text-lg mb-2">
                                        Kelurahan {acara?.desa}, Kecamatan{" "}
                                        {acara?.kecamatan}
                                    </h1>
                                    {acara?.mapUrl && (
                                        <Map url={acara?.mapUrl} />
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </MainLayout>
        </>
    );
}
