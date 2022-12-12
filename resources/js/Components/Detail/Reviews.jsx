import React from "react";
import ScrollContainer from "react-indiana-drag-scroll";
import ReviewCard from "./ReviewCard";

export default function Reviews({ data }) {
    return (
        <ScrollContainer className="overflow-scroll flex gap-x-7 pt-3 pb-6 scroll-m-5 snap-x pl-2">
            {data?.map((item) => (
                <ReviewCard
                    title={item.name}
                    text={item.message}
                    id={item.id}
                />
            )) || "Loading..."}
        </ScrollContainer>
    );
}
