import React from "react";

export default function Map({ url }) {
    console.log(url);
    var regex = new RegExp("@(.*),(.*),");
    console.log(regex);
    var lat_long_match = url.match(regex);
    console.log(lat_long_match);
    var lat = parseFloat(lat_long_match[1]);
    console.log(lat);
    var long = parseFloat(lat_long_match[2]);
    console.log(long);

    return (
        <>
            <iframe
                src={`https://maps.google.com/maps?q=${lat},${long}&hl=id&z=14&amp&output=embed`}
                style={{
                    height: "272px",
                    position: "inherit",
                }}
            ></iframe>
        </>
    );
}
