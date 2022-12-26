import { Head, useForm, usePage } from "@inertiajs/inertia-react";
import React from "react";
import { useEffect } from "react";
import { useState } from "react";
import FotoList from "../../Components/FotoList";
import InputText from "../../Components/InputText";
import Lainnya from "../../Components/Lainnya";
import Operasional from "../../Components/Operasional";
import Select from "../../Components/Select";
import Tags from "../../Components/Tags";
import MainLayout from "../../Layouts/MainLayout";

const kecamatan = [
    { id: 1, name: "Argomulyo" },
    { id: 2, name: "Tingkir" },
    { id: 3, name: "Sidomukti" },
    { id: 4, name: "Sidorejo" },
];

export default function Add({ category, subcat, message, id }) {
    const [field, setField] = useState({});
    const [loading, setLoading] = useState(false);
    const [desa, setDesa] = useState([]);
    const [fotoArr, setFotoArr] = useState([0]);
    const [foto, setFoto] = useState([]);
    const [imgDesc, setImgDesc] = useState([]);
    const [categoryOption, setCategoryOption] = useState(
        subcat.map((item) => {
            return {
                id: item.id,
                name: item.name,
            };
        })
    );
    const [selectedTags, setSelectedTags] = useState([]);
    const { data, setData, post, progress } = useForm({});
    const { errors } = usePage().props;

    useEffect(() => {
        if (message) {
            console.log("message", message);
        }
    }, []);

    const handleChange = (e) => {
        const name = e?.target?.name;
        const value = e?.target?.value;

        if (value !== undefined || name !== undefined) {
            setData({
                ...data,
                [name]: value,
            });
        } else {
            const data = e.map((item) => {
                return item.name;
            });
            setData({
                ...data,
                tags: data,
            });
        }

        if (name === "kecamatan") {
            handleSelectKecamatan(value);
        }
    };

    const handleSelectKecamatan = (value) => {
        switch (value) {
            case "Argomulyo":
                setDesa([
                    { id: 1, name: "Noborejo" },
                    { id: 2, name: "Cebongan" },
                    { id: 3, name: "Randuacir" },
                    { id: 4, name: "Ledok" },
                    { id: 5, name: "Tegalrejo" },
                    { id: 6, name: "Kumpulrejo" },
                ]);
                break;
            case "Tingkir":
                setDesa([
                    { id: 1, name: "Tingkir Lor" },
                    { id: 2, name: "Kalibening" },
                    { id: 3, name: "Sidorejo Kidul" },
                    { id: 4, name: "Gendongan" },
                    { id: 5, name: "Kutowinangun Kidul" },
                    { id: 6, name: "Kutowinangun Lor" },
                ]);
                break;
            case "Sidomukti":
                setDesa([
                    { id: 1, name: "Kecandran" },
                    { id: 2, name: "Mangunsari" },
                    { id: 3, name: "Kalicacing" },
                ]);
                break;
            case "Sidorejo":
                setDesa([
                    { id: 1, name: "Pulutan" },
                    { id: 2, name: "Blotongan" },
                    { id: 3, name: "Kauman Kidul" },
                    { id: 4, name: "Salatiga" },
                    { id: 5, name: "Sidorejo Lor" },
                ]);
                break;
            default:
                setDesa([]);
                break;
        }
    };

    const handleChangeFoto = (e) => {
        const name = e?.target?.name;
        const value = e?.target?.files[0];

        setFoto([...foto, value]);
    };

    const handleAddFoto = () => {
        setFotoArr([...fotoArr, fotoArr[fotoArr.length - 1] + 1]);
    };

    const handleDeleteFoto = (id) => {
        console.log("id", id);
        setFotoArr(fotoArr.filter((item) => item !== id));
        setFoto(foto.filter((item, index) => index !== id));
    };

    const handleChangeDesc = (e) => {
        const name = e?.target?.name;
        const value = e?.target?.value;

        setImgDesc([...imgDesc, value]);
    };

    const handleSubmit = (e) => {
        setLoading(true);
        e.preventDefault();
        console.log(data);
        post("/add-place");
    };

    useEffect(() => {
        setData({
            ...data,
            gambar: foto,
            imgDesc: imgDesc,
        });
    }, [foto, imgDesc]);

    return (
        <>
            <Head>
                <title>Tambahkan Tempat | Disbudpar Salatiga</title>
            </Head>
            <MainLayout>
                <div className="bg-[#EFF5FF] py-48">
                    <form
                        onSubmit={handleSubmit}
                        className="mx-9  bg-white rounded-2xl px-12 py-8 shadow-md"
                    >
                        <div className="w-full mb-6">
                            <h1 className="font-semibold text-3xl">
                                Tambahkan Tempat
                            </h1>
                            {/* {errors && <p className="text-red-600">{errors}</p>} */}
                            <div className="w-6/12 lg:w-1/12 flex gap-x-2 mb-3 items-center mt-1">
                                <div className="w-2/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                <div className="w-4/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                <div className="w-4/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                <div className="w-2/12 h-1 bg-[#F4D35E] rounded-md"></div>
                            </div>
                        </div>
                        <InputText
                            label="Nama"
                            placeholder="Masukkan nama tempat"
                            type="text"
                            required
                            name="tName"
                            value=""
                            onChange={handleChange}
                            error={errors?.tName}
                        />
                        <InputText
                            label="Deskripsi"
                            placeholder="Masukkan deskripsi tempat"
                            required
                            name="tDesc"
                            value=""
                            onChange={handleChange}
                            error={errors?.tDesc}
                            textArea
                        />
                        <div className="lg:flex gap-x-7">
                            <Select
                                label="Kecamatan"
                                placeholder="Pilih kecamatan"
                                required
                                name="kecamatan"
                                value=""
                                onChange={handleChange}
                                error={errors?.kecamatan}
                                options={kecamatan}
                            />
                            <Select
                                label="Desa"
                                placeholder="Pilih desa"
                                required
                                name="desa"
                                value=""
                                onChange={handleChange}
                                error={errors?.desa}
                                options={desa}
                            />
                        </div>
                        <InputText
                            label="Alamat"
                            placeholder="Masukkan alamat tempat"
                            required
                            name="tAddress"
                            value=""
                            onChange={handleChange}
                            error={errors?.tAddress}
                        />
                        <InputText
                            label="Map URL"
                            placeholder="Masukkan map url tempat"
                            required
                            name="tMapUrl"
                            value=""
                            onChange={handleChange}
                            error={errors?.tMapUrl}
                        />
                        <InputText
                            label="Harga Tiket"
                            placeholder="Masukkan harga tiket tempat"
                            type={"number"}
                            name="tTicket"
                            value=""
                            onChange={handleChange}
                            error={errors?.tTicket}
                        />
                        <InputText
                            label="Website"
                            placeholder="Masukkan website tempat *Jika ada"
                            name="tUrl"
                            value=""
                            onChange={handleChange}
                            error={errors?.tUrl}
                        />
                        <InputText
                            label="Video"
                            placeholder="Masukkan video tempat *Jika ada"
                            name="tVideo"
                            value=""
                            onChange={handleChange}
                            error={errors?.tVideo}
                        />
                        {fotoArr.map((item, index) => (
                            <FotoList
                                key={index}
                                index={index}
                                foto={item}
                                onChange={handleChangeFoto}
                                onDelete={handleDeleteFoto}
                                onAdd={handleAddFoto}
                                onChangeDesc={handleChangeDesc}
                            />
                        ))}
                        <Operasional
                            label="Jam Operasional"
                            placeholder="Masukkan jam operasional tempat"
                            required
                            name="tOperasional"
                            value=""
                            onChange={handleChange}
                            error={errors?.tOperasional}
                        />
                        <Lainnya
                            label="Lainnya"
                            placeholder="Masukkan lainnya tempat"
                            required
                            name="tLainnya"
                            value=""
                            onChange={handleChange}
                            error={errors?.tLainnya}
                        />
                        <Tags
                            label="Tags"
                            placeholder="Masukkan tags tempat"
                            required
                            name="tTags"
                            value=""
                            onChange={handleChange}
                            options={categoryOption}
                            error={errors?.tTags}
                        />
                        <div className="flex justify-start gap-x-4 mt-8">
                            <button
                                type="submit"
                                className="bg-[#23A6F0] hover:bg-[#23A6F0]/90 duration-150 text-white font-semibold rounded-md px-8 py-2"
                            >
                                {loading ? (
                                    <>
                                        <i className="fas fa-spinner animate-spin"></i>{" "}
                                        Menyimpan
                                    </>
                                ) : (
                                    "Simpan"
                                )}
                            </button>
                            <button
                                type="button"
                                className="bg-[#C72E2E] hover:bg-[#C72E2E]/90 duration-150 text-white font-semibold rounded-md px-8 py-2"
                            >
                                <a href="/">Batal</a>
                            </button>
                        </div>
                    </form>
                </div>
            </MainLayout>
        </>
    );
}
