import { Inertia } from "@inertiajs/inertia";
import { Head } from "@inertiajs/inertia-react";
import React from "react";
import { useState } from "react";
import MainLayout from "../../Layouts/MainLayout";

export default function Login({ addplace, error }) {
    const [field, setField] = useState({});
    console.log(error);

    const onChange = (e) => {
        const name = e?.target?.name;
        const value = e?.target?.value;

        setField({
            ...field,
            [name]: value,
        });
    };

    const handleLogin = async (e) => {
        e.preventDefault();
        Inertia.post("actionlogin", {
            ...field,
            addplace,
        });
    };

    return (
        <>
            <Head>
                <title>Login | Disbudpar Salatiga</title>
            </Head>
            <MainLayout>
                <div className="w-full flex items-center relative">
                    <img
                        src="vector/bg login.png"
                        className="h-screen lg:h-auto lg:w-screen object-cover -z-20 object-center absolute inset-0"
                        alt=""
                    />
                    <div className="max-w-5xl max-h-[30rem] my-44 flex rounded-3xl mx-auto bg-[#D3E3FE]/70">
                        <div className="w-1/2 px-5 lg:px-28 py-5 flex flex-col justify-center items-center">
                            <h1 className="text-center font-bold font-heading text-4xl mb-7">
                                LOGIN
                            </h1>
                            <div className="w-full bg-[#C24444] flex justify-center items-center gap-x-3 py-2 text-center mb-4 rounded-xl text-white font-heading text-md">
                                <i class="fab fa-google"></i>
                                <a href="/auth/redirect" className="">
                                    Login with Google
                                </a>
                            </div>
                            <div className="w-full px-5 mb-4 grid grid-cols-10">
                                <div className="col-span-4 flex items-center">
                                    <div className="w-full flex gap-x-2 items-center">
                                        <div className="w-2/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                        <div className="w-4/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                        <div className="w-4/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                        <div className="w-2/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                    </div>
                                </div>
                                <div className="col-span-2 justify-center flex items-center">
                                    <p>atau</p>
                                </div>
                                <div className="col-span-4 flex items-center">
                                    <div className="w-full flex gap-x-2 items-center">
                                        <div className="w-2/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                        <div className="w-4/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                        <div className="w-4/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                        <div className="w-2/12 h-1 bg-[#F4D35E] rounded-md"></div>
                                    </div>
                                </div>
                            </div>
                            <form
                                onSubmit={handleLogin}
                                className="w-full"
                                action=""
                            >
                                <div className="w-full flex flex-col gap-y-4">
                                    <input
                                        onChange={onChange}
                                        required
                                        type="email"
                                        name="email"
                                        id="email"
                                        className="w-full px-4 py-2 rounded-xl  focus:outline-none"
                                    />
                                    <input
                                        onChange={onChange}
                                        required
                                        type="password"
                                        name="password"
                                        id="password"
                                        className="w-full px-4 py-2 rounded-xl focus:outline-none"
                                    />
                                    {error && (
                                        <p className="text-center py-2 bg-red-200 text-red-700">
                                            {error}
                                        </p>
                                    )}
                                    <button
                                        type="submit"
                                        className="w-full bg-[#23A6F0] text-white font-semibold text-lg py-2 rounded-xl"
                                    >
                                        Login
                                    </button>
                                </div>
                            </form>
                            <a
                                href="/forget-password"
                                className="text-red-500 my-1"
                            >
                                Forget password
                            </a>
                            <a href="/register" className="italic">
                                don't have an account?{" "}
                                <span className="text-blue-500">SignUp</span>
                            </a>
                        </div>
                        <img
                            src="/vector/login form bg.png"
                            className="w-1/2 object-cove  rounded-r-3xl object-center"
                            alt=""
                        />
                    </div>
                </div>
            </MainLayout>
        </>
    );
}
