import { Calendar, momentLocalizer } from "react-big-calendar";
import moment from "moment";
import React, { useState } from "react";
import MainLayout from "../../Layouts/MainLayout";
import { useEffect } from "react";
import { Head } from "@inertiajs/inertia-react";
import { AnimatePresence, motion } from "framer-motion";
const localizer = momentLocalizer(moment);

export default function CalendarPage({ acara }) {
    const [[page, direction], setPage] = useState([0, 0]);
    const [loading, setLoading] = useState(true);
    const [data, setData] = useState([]);
    const [selected, setSelected] = useState(null);
    const [showModal, setShowModal] = useState(false);

    const paginate = (newDirection) => {
        setPage([page + newDirection, newDirection]);
    };

    console.log("acara =>", acara);

    useEffect(() => {
        const events = acara.map((item) => {
            return {
                ...item,
                id: item.id,
                title: item.name,
                desc: item.desc,
            };
        });

        setData(events);
        setLoading(false);
    }, []);

    const handleOpenEvent = (event) => {
        setSelected(event);
        setShowModal(true);
    };

    return (
        <>
            <Head>
                <title>Kalender Acara | Disbudpar Salatiga</title>
            </Head>
            <MainLayout>
                <div className="h-screen relative overflow-hidden w-full px-10 flex justify-between items-center">
                    <img
                        src="/vector/kalender.svg"
                        className="absolute -right-8 -top-8 -z-10"
                        alt=""
                    />
                    <div className="relative z-">
                        <h1 className="font-bold font-heading text-5xl">
                            Kalender Acara
                        </h1>
                        <p className="font-normal font-heading text-xl lg:text-5xl">
                            Jelajahi Berbagai Tempat <br />
                            Di Salatiga
                        </p>
                    </div>
                    <div className="relative">
                        <img
                            src="/vector/orang kalender.png"
                            className="scale-75 -mr-48"
                            alt=""
                        />
                    </div>
                </div>
                <AnimatePresence>
                    {showModal && (
                        <motion.div
                            initial={{ opacity: 0 }}
                            animate={{ opacity: 1 }}
                            exit={{ opacity: 0 }}
                            className="h-full w-full relative z-50"
                        >
                            <motion.div
                                className="fixed h-full w-full in left-0 top-0 bg-black opacity-0 pointer-events-none"
                                animate={{ opacity: showModal ? 0.3 : 0 }}
                            />
                            <motion.div
                                layoutId="expandable-card"
                                // onClick={collapseItem}
                                className={`w-full lg:w-5/6 h-screen lg:absolute fixed inset-0 m-auto z-[60] overflow-scroll bg-white rounded-2xl shadow-lg hover:shadow-md px-12 lg:px-24 py-44 lg:py-16`}
                                layout
                            >
                                <div className="w-full h-[200px] lg:h-[634px] absolute inset-0">
                                    <div className="relative w-full h-full">
                                        <img
                                            src="/vector/blob.png"
                                            className="absolute z-10 top-5 right-16"
                                        />
                                        <img
                                            src="/vector/blob2.png"
                                            className="absolute z-10 -bottom-1 lg:-bottom-10 left-7 lg:left-16"
                                        />
                                        <i
                                            onClick={() =>
                                                setShowModal(!showModal)
                                            }
                                            className="fas fa-close absolute top-5 lg:top-3 right-5 text-3xl cursor-pointer"
                                        ></i>
                                    </div>
                                </div>
                                <div className="h-auto lg:h-[570px] w-full lg:overflow-scroll relative z-20">
                                    <img
                                        className="rounded-md relative z-30 w-full h-auto shadow-md"
                                        src={`/img/acara/${selected?.image}`}
                                    />
                                </div>
                                <h1 className="font-bold font-heading relative z-30 text-2xl mt-7">
                                    {selected?.name}
                                </h1>
                                <div className="pr-16 w-1/2 lg:w-3/12 flex gap-x-2 mt-2 mb-4 items-center">
                                    <div className="w-4/12 h-2 bg-[#B9EAA8] rounded-md"></div>
                                    <div className="w-6/12 h-2 bg-[#B9EAA8] rounded-md"></div>
                                    <div className="w-2/12 h-2 bg-[#B9EAA8] rounded-md"></div>
                                </div>
                                <h1 className="font-medium text-2xl my-3 font-heading">
                                    Deskripsi
                                </h1>
                                <p className="font-heading text-lg">
                                    {selected?.desc}
                                </p>
                                <h1 className="font-medium text-2xl my-3 font-heading">
                                    Operasional
                                </h1>
                                <div className="flex flex-col gap-y-3 ml-11">
                                    <div className="flex items-center gap-x-2">
                                        <img
                                            src="/vector/bulletPyramid.png"
                                            className="w-4"
                                            alt=""
                                        />
                                        <p className="font-heading text-lg">
                                            Tanggal mulai : {selected?.start}
                                        </p>
                                    </div>
                                    <div className="flex items-center gap-x-2">
                                        <img
                                            src="/vector/bulletPyramid.png"
                                            className="w-4"
                                            alt=""
                                        />
                                        <p className="font-heading text-lg">
                                            Tanggal selesai : {selected?.end}
                                        </p>
                                    </div>
                                </div>
                                <a
                                    href={`/acara/${selected?.id}`}
                                    className="w-full flex justify-end"
                                >
                                    <button className="bg-[#23A6F0] text-white font-bold font-heading text-lg px-6 py-2 rounded-md mt-10">
                                        Lihat Detail
                                    </button>
                                </a>
                            </motion.div>
                        </motion.div>
                    )}
                </AnimatePresence>
                <div className="lg:max-w-5xl relative z-30 mx-auto -mt-24 mb-20">
                    {loading ? (
                        <p>Memuat data...</p>
                    ) : (
                        <div className="bg-[#FBB52F66] rounded-xl px-12 py-16">
                            <Calendar
                                className="bg-white"
                                localizer={localizer}
                                events={data || []}
                                onSelectEvent={handleOpenEvent}
                                startAccessor="start"
                                endAccessor="end"
                                style={{ height: 500 }}
                            />
                        </div>
                    )}
                </div>
            </MainLayout>
        </>
    );
}
