import { AnimatePresence } from "framer-motion";
import React, { useEffect, useState } from "react";
import CardSkeleton from "./CardSkeleton";
import MenuItem from "./MenuItem";
import TempatCard from "./TempatCard";

export default function SearchCards({ allcat = [], subcat = [], tempat = [] }) {
    const [category, setCategory] = useState(0);
    const [loading, setLoading] = useState(true);
    const [isFetching, setIsFetching] = useState(false);
    const [selectedMenu, setSelectedMenu] = useState();
    const [tempats, setTempats] = useState(tempat);

    useEffect(() => {
        const mergeCategory = allcat.map((item) => {
            const sub = subcat.filter(
                (sub) => parseInt(sub.category) === item.id
            );

            return {
                ...item,
                sub,
            };
        });

        setCategory(mergeCategory);
        setLoading(false);
    }, []);

    const handleSearch = async (categoryId, slugs) => {
        setIsFetching(true);
        const API_URL = "http://localhost:8000";
        const endpoint = `${API_URL}/api/search?cari=${slugs}&cat=${categoryId}`;
        const options = {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        };

        const res = await fetch(endpoint, options);
        const data = await res.json();

        if (data?.success) {
            setTempats(data.data);
            setIsFetching(false);
        }
    };

    return (
        <div className="min-h-screen pb-60 relative z-20 lg:mt-[340px] mt-32">
            <div className="px-10 grid grid-cols-12 gap-x-9">
                <div className="col-span-3 h-fit sticky top-36 flex flex-col gap-y-2 bg-white rounded-2xl shadow-md px-5 py-6">
                    {loading ? (
                        <p>loading...</p>
                    ) : (
                        category.map((item) => (
                            <MenuItem
                                key={item.id}
                                icon={item.icon}
                                title={item.name}
                                subCat={item.sub}
                                onSearch={handleSearch}
                                isOpen={item.id === selectedMenu}
                                onClick={
                                    item.id === selectedMenu
                                        ? () => setSelectedMenu()
                                        : () => setSelectedMenu(item.id)
                                }
                            />
                        ))
                    )}
                </div>
                <div className="col-span-9 flex flex-col gap-y-7">
                    <AnimatePresence>
                        {isFetching ? (
                            <>
                                <CardSkeleton />
                                <CardSkeleton />
                                <CardSkeleton />
                            </>
                        ) : tempats.length === 0 ? (
                            <p>Tidak ada data</p>
                        ) : (
                            tempats.map((item, idx) => (
                                <TempatCard
                                    key={item.id}
                                    title={item.name}
                                    kategori={item.tags}
                                    deskripsi={item.desc}
                                    image={item.image}
                                    id={item.id}
                                    idx={idx}
                                />
                            ))
                        )}
                    </AnimatePresence>
                </div>
            </div>
        </div>
    );
}
