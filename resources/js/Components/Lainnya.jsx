import React from "react";

export default function Lainnya({ onChange, error }) {
    return (
        <div className="w-full flex lg:flex-row flex-col gap-9 mb-4">
            <span className="py-1 px-5 relative z-30 text-center text-white bg-[#23A6F0] rounded-lg">
                Lainnya
            </span>
            <div className="flex items-center gap-x-4">
                <input
                    onChange={onChange}
                    type="checkbox"
                    name="cDisabilitas"
                    id="cDisabilitas"
                    className="w-6 h-6 shadow-md border-none outline-none rounded-lg"
                    value="1"
                />
                <label className="m-0" htmlFor="cDisabilitas">
                    Ramah disabilitas
                </label>
            </div>
            <div className="flex items-center gap-x-4">
                <input
                    onChange={onChange}
                    type="checkbox"
                    name="cParkir"
                    id="cParkir"
                    className="w-6 h-6 shadow-md border-none outline-none rounded-lg"
                    value="1"
                />
                <label className="m-0" htmlFor="cParkir">
                    Tersedia Parkir
                </label>
            </div>
            <div className="flex items-center gap-x-4">
                <input
                    onChange={onChange}
                    type="checkbox"
                    name="cWifi"
                    id="cWifi"
                    className="w-6 h-6 shadow-md border-none outline-none rounded-lg"
                    value="1"
                />
                <label className="m-0" htmlFor="cWifi">
                    Tersedia Wifi
                </label>
            </div>
            <div className="flex items-center gap-x-4">
                <input
                    onChange={onChange}
                    type="checkbox"
                    name="cHeadline"
                    id="cHeadline"
                    className="w-6 h-6 shadow-md border-none outline-none rounded-lg"
                    value="1"
                />
                <label className="m-0" htmlFor="cHeadline">
                    Tampilkan
                </label>
            </div>
            {error && (
                <p className="text-center py-2 bg-red-200 text-red-700">
                    {error}
                </p>
            )}
        </div>
    );
}
