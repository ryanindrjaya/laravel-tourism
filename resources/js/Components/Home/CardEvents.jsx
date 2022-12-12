import React, { useState } from "react";
import CardEventItem from "./CardEventItem";

export default function CardEvents({ data }) {
    const [expanded, setExpanded] = useState();
    console.log("data", data);
    return (
        <div className="w-full relative z-50 flex gap-x-7 px-16 mt-32">
            {data.map((item, idx) => (
                <CardEventItem
                    isOdd={idx === 0 || idx === 2 ? "-mt-24" : ""}
                    name={item?.name}
                    image={item?.image}
                    data={item}
                    isExpanded={expanded === idx && expanded !== undefined}
                    onExpand={() => setExpanded(idx)}
                    onCollapse={() => setExpanded()}
                />
            ))}
        </div>
    );
}
