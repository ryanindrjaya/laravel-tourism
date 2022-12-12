import { AnimatePresence, motion } from "framer-motion";
import { wrap } from "popmotion";
import React, { useState } from "react";
import Rating from "react-rating";
import Map from "../../Components/Detail/Map";
import Reviews from "../../Components/Detail/Reviews";
import Video from "../../Components/Detail/Video";
import MainLayout from "../../Layouts/MainLayout";

const Fasilitas = ({ icon, text }) => {
    return (
        <div className="flex flex-col items-center justify-center">
            <img
                className="p-2 h-24 rounded-full bg-white shadow-sm"
                src={`/vector/tempat/${icon}`}
                alt=""
            />
            <h1 className="font-heading text-xl mt-2">{text}</h1>
        </div>
    );
};

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

export default function Detail({ tempat, imageArray, ratings, reviews }) {
    console.log("tempat", tempat);
    console.log("imageArray", imageArray);
    console.log("ratings", ratings);
    console.log("reviews", reviews);

    const [[page, direction], setPage] = useState([0, 0]);
    const imageIndex = wrap(0, imageArray.length, page);

    const paginate = (newDirection) => {
        setPage([page + newDirection, newDirection]);
    };

    return (
        <MainLayout>
            <div className="w-full overflow-hidden">
                <div className="w-full h-screen relative">
                    <img
                        src={`/img/tempat/${tempat?.image}`}
                        className="h-full w-full object-cover object-center"
                    />
                    <div className="w-full h-full absolute inset-0 bg-black/20 backdrop-blur-sm"></div>
                </div>

                <div className="bg-[#EFF5FF] pb-32 w-full">
                    <div className="max-w-5xl m-auto  relative">
                        <div className="bg-white flex shadow-md -mt-28 rounded-2xl justify-between px-9 py-7">
                            <Fasilitas icon="jam.svg" text="Buka Setiap Hari" />
                            <Fasilitas
                                icon="wifi.svg"
                                text={
                                    tempat?.wifi === 0
                                        ? "Tidak Ada Wifi"
                                        : "Free Wifi"
                                }
                            />
                            <Fasilitas
                                icon="disabilitas.svg"
                                text={
                                    tempat?.disabilities === 0
                                        ? "Tidak Ramah Disabilitas"
                                        : "Ramah Disabilitas"
                                }
                            />
                            <Fasilitas
                                icon="setir.svg"
                                text={
                                    tempat?.parkir === 0
                                        ? "Tidak Terdapat Area Parkia"
                                        : "Area Parkir"
                                }
                            />
                        </div>
                        <div className="mt-20 text-3xl font-heading ">
                            <h1 className="text-center font-medium">
                                Gambar Destinasi
                            </h1>
                            <h1 className="text-center">{tempat?.name}</h1>
                            {imageArray.length > 0 && (
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
                                                src={`/img/tempat/${imageArray[imageIndex].image}`}
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
                                                    opacity: { duration: 0.2 },
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
                                                    const swipe = swipePower(
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
                                    {tempat?.desc}
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
                                <div className="w-5/12 grid grid-cols-2 gap-x-2">
                                    <p className="font-heading col-span-1 text-lg mb-2">
                                        Senin - Jumat
                                    </p>
                                    <p className="font-heading col-span-1 font-bold text-lg">
                                        : {tempat?.seninJumat} WIB
                                    </p>
                                </div>
                                <div className="w-5/12 grid grid-cols-2 gap-x-2 mb-4">
                                    <p className="font-heading col-span-1 text-lg mb-2">
                                        Sabtu - Minggu
                                    </p>
                                    <p className="font-heading col-span-1 font-bold text-lg">
                                        : {tempat?.sabtuMinggu} WIB
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
                                    {tempat?.url || "-"}
                                </p>
                                <div className="w-full mb-3 relative">
                                    {tempat?.video && (
                                        <Video video={tempat?.video} />
                                    )}
                                </div>

                                <div className="w-full flex justify-center gap-x-24">
                                    <div className=" flex flex-col gap-y-2 text-2xl items-center justify-center">
                                        <i class="fas fa-folder-open text-[#23A6F0]"></i>
                                        <p className="text-md">
                                            {tempat?.tags}
                                        </p>
                                    </div>
                                    <div className=" flex flex-col gap-y-2 text-2xl items-center justify-center">
                                        <i class="fas fa-ticket-alt text-[#FBB52F]"></i>
                                        <p className="text-md">
                                            Rp. {tempat?.ticket}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div className="w-full mt-12 mb-24 px-7 py-5 rounded-2xl bg-white shadow-md">
                                <div className="mb-3">
                                    <h1 className="font-bold font-heading text-xl">
                                        Alamat :
                                    </h1>
                                    <div className="w-1/6 flex gap-x-2 my-1">
                                        <div className="w-7/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                        <div className="w-5/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                    </div>
                                </div>
                                <h1 className="text-lg mb-2">
                                    Kelurahan {tempat?.desa}, Kecamatan{" "}
                                    {tempat?.kecamatan}
                                </h1>
                                {tempat?.mapUrl && <Map url={tempat?.mapUrl} />}
                            </div>
                            <div className="w-full mt-12 px-7 py-5 rounded-2xl bg-white shadow-md">
                                <div className="mb-3">
                                    <h1 className="font-bold font-heading text-xl">
                                        Review :
                                    </h1>
                                    <div className="w-1/6 flex gap-x-2 my-1">
                                        <div className="w-2/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                        <div className="w-7/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                        <div className="w-3/12 h-2 rounded-full bg-[#D9D9D9]"></div>
                                    </div>
                                    <div className="w-full flex my-3 flex-col justify-center items-center">
                                        <Rating
                                            readonly
                                            initialRating={ratings}
                                            emptySymbol="fa fa-star-o text-[#FBB52F]"
                                            fullSymbol="fa fa-star text-[#FBB52F]"
                                            fractions={2}
                                        />
                                        <h1>{parseInt(ratings) || 0} / 10</h1>
                                    </div>

                                    <Reviews data={reviews} />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </MainLayout>
    );
}
