import React from "react";
import HeroBanner from "../../Components/Search/HeroBanner";
import SearchCards from "../../Components/Search/SearchCards";
import MainLayout from "../../Layouts/MainLayout";

export default function Index({ ...props }) {
    console.log("props", props);
    return (
        <MainLayout>
            <div className="bg-[#EFF5FF]">
                <HeroBanner />
                <SearchCards {...props} />
            </div>
        </MainLayout>
    );
}
