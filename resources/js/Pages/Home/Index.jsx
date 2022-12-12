import React, { useEffect, useState } from "react";
import Header from "../../Components/Header";
import HeroBanner from "../../Components/Home/HeroBanner";
import PathAnimationBanner from "../../Components/Home/PathAnimationBanner";
import VisiMisi from "../../Components/Home/VisiMisi";
import Destinasi from "../../Components/Home/Destinasi";
import { AnimatePresence } from "framer-motion";
import StickyHeader from "../../Components/StickyHeader";
import Event from "../../Components/Home/Event";
import Footer from "../../Components/Footer";
import MainLayout from "../../Layouts/MainLayout";

export default function Index(props) {
    const destinasi = props?.destinasi || [];
    const acaras = props?.acaras || [];

    return (
        <MainLayout>
            <PathAnimationBanner />

            <HeroBanner />

            <VisiMisi />

            <div className="bg-[#EFF5FF]">
                <Destinasi data={destinasi} />
                <Event data={acaras} />
            </div>
        </MainLayout>
    );
}
