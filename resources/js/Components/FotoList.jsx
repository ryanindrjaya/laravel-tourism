import React from "react";

export default function FotoList({
    index,
    foto,
    onChange,
    onDelete,
    onAdd,
    onChangeDesc,
}) {
    return (
        <div className="w-full mb-4">
            {index === 0 && (
                <span className="py-1 px-5 relative z-30 text-center text-white bg-[#23A6F0] rounded-t-lg">
                    Foto
                </span>
            )}
            <div className="flex lg:flex-row flex-col  gap-4 w-full">
                <div className="w-full flex-col lg:flex-row bg-white relative z-20 rounded-lg shadow-md">
                    <input
                        onChange={(e) => onChange(e, index)}
                        type="file"
                        name="foto"
                        id="foto"
                        className="w-full px-4 py-2 text-md rounded-xl border-none focus:outline-none"
                    />
                    <input
                        onChange={(e) => onChangeDesc(e)}
                        type="text"
                        name="deskripsi"
                        id="deskripsi"
                        placeholder="Masukkan deskripsi foto"
                        className="lg:absolute w-full lg:w-1/4 placeholder:text-white text-white h-full right-0 bg-[#23A6F0] px-4 py-2 text-md rounded-b-lg lg:rounded-b-none lg:rounded-r-xl border-none focus:outline-none"
                    />
                </div>
                <div>
                    {index !== 0 && (
                        <button
                            type="button"
                            onClick={() => onDelete(foto)}
                            className="w-full px-4 py-2 text-md rounded-xl border-none focus:outline-none bg-red-500 text-white"
                        >
                            <i className="fas fa-trash"></i>
                        </button>
                    )}
                    {index === 0 && (
                        <button
                            type="button"
                            onClick={onAdd}
                            className="w-full px-4 py-2 text-md rounded-xl border-none focus:outline-none bg-green-500 text-white"
                        >
                            <i className="fas fa-add"></i>
                        </button>
                    )}
                </div>
            </div>
        </div>
    );
}
