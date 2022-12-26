import React from "react";

export default function Operasional({ onChange, error }) {
    return (
        <div className="w-full mb-4">
            <span className="py-1 px-5 relative z-30 text-center text-white bg-[#23A6F0] rounded-lg">
                Operasional
            </span>
            <div className="flex lg:flex-row flex-col gap-8">
                <div className="w-full lg:w-1/2 bg-white relative z-20 ">
                    <h1 className="font-bold my-2 font-heading">
                        Senin - Jumat
                    </h1>
                    <div className="flex items-center gap-x-6 flex-row justify-between">
                        <div className="w-full lg:w-1/2">
                            <input
                                onChange={onChange}
                                type="time"
                                name="seninJumat1"
                                id="jam_buka"
                                className="w-full px-4 py-2 bg-[#23A6F0] text-md text-white rounded-xl border-none focus:outline-none"
                            />
                        </div>
                        <h1>Sampai</h1>
                        <div className="w-full lg:w-1/2">
                            <input
                                onChange={onChange}
                                type="time"
                                name="seninJumat2"
                                id="jam_tutup"
                                className="w-full px-4 py-2 bg-[#23A6F0] text-md text-white rounded-xl border-none focus:outline-none"
                            />
                        </div>
                    </div>
                    {error && (
                        <p className="text-center py-2 bg-red-200 text-red-700">
                            {error}
                        </p>
                    )}
                </div>
                <div className="w-full lg:w-1/2 bg-white relative z-20 ">
                    <h1 className="font-bold my-2 font-heading">
                        Sabtu - Minggu
                    </h1>
                    <div className="flex items-center gap-x-6 flex-row justify-between">
                        <div className="w-full lg:w-1/2">
                            <input
                                onChange={onChange}
                                type="time"
                                name="sabtuMinggu1"
                                id="jam_buka"
                                className="w-full px-4 py-2 bg-[#23A6F0] text-md text-white rounded-xl border-none focus:outline-none"
                            />
                        </div>
                        <h1>Sampai</h1>
                        <div className="w-full lg:w-1/2">
                            <input
                                onChange={onChange}
                                type="time"
                                name="sabtuMinggu2"
                                id="jam_tutup"
                                className="w-full px-4 py-2 bg-[#23A6F0] text-md text-white rounded-xl border-none focus:outline-none"
                            />
                        </div>
                    </div>
                    {error && (
                        <p className="text-center py-2 bg-red-200 text-red-700">
                            {error}
                        </p>
                    )}
                </div>
            </div>
        </div>
    );
}
