import React from "react";

export default function Video({ video }) {
    function getId(url) {
        const regExp =
            /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);

        return match && match[2].length === 11 ? match[2] : null;
    }

    const videoId = getId(video);

    return (
        <iframe
            className="relative mb-5 h-[300px] md:h-[500px] lg:h-[500px]"
            src={`//www.youtube.com/embed/${videoId}`}
            frameborder="0"
            allowfullscreen
        ></iframe>
    );
}
