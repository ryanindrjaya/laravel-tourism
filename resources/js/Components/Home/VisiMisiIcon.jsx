import React from "react";

export default function VisiMisiIcon({ connector, icon }) {
    return (
        <div className="col-span-1">
            {!connector ? (
                <div className="flex justify-center items-center">
                    <div className="w-28 h-28 rounded-full bg-white flex justify-center items-center">
                        {icon}
                    </div>
                </div>
            ) : (
                <div className="h-full w-full flex gap-x-2 items-center">
                    <div className="w-4/12 h-1 bg-[#FBB52F] rounded-md"></div>
                    <div className="w-6/12 h-1 bg-[#FBB52F] rounded-md"></div>
                    <div className="w-2/12 h-1 bg-[#FBB52F] rounded-md"></div>
                </div>
            )}
        </div>
    );
}
