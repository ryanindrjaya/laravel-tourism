import { AnimatePresence } from "framer-motion";
import React, { useEffect, useState } from "react";
import Footer from "../Components/Footer";
import Header from "../Components/Header";
import StickyHeader from "../Components/StickyHeader";

export default function MainLayout({ children }) {
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
        <>
            <AnimatePresence>
                {isSticky ? <StickyHeader /> : <Header />}
            </AnimatePresence>
            {children}
            <Footer />
        </>
    );
}
