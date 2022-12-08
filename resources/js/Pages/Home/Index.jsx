import React, { useEffect, useState } from "react";
import Header from "../../Components/Header";
import HeroBanner from "../../Components/Home/HeroBanner";
import PathAnimationBanner from "../../Components/Home/PathAnimationBanner";

export default function Index() {
    const [offset, setOffset] = useState(0);
    const [isSticky, setIsSticky] = useState(false);

    useEffect(() => {
        const onScroll = () => setOffset(window.pageYOffset);
        // clean up code
        window.removeEventListener("scroll", onScroll);
        window.addEventListener("scroll", onScroll, { passive: true });
        return () => window.removeEventListener("scroll", onScroll);
    }, []);

    useEffect(() => {
        if (offset > 122) {
            setIsSticky(true);
        } else {
            setIsSticky(false);
        }
    }, [offset]);

    return (
        <div>
            <PathAnimationBanner />
            <Header />

            <HeroBanner />
        </div>
    );
}
