import { CompreFace } from "@exadel/compreface-js-sdk";
import Swal from "sweetalert2";

const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
const btn = document.getElementById("scanFace");

navigator.mediaDevices
    .getUserMedia({
        video: true,
        audio: false,
    })
    .then((stream) => {
        video.srcObject = stream;
    })
    .catch((error) => {
        console.error(error);
    });

video.addEventListener("play", () => {
    let api_key = "27baa3c1-4970-4852-ba5b-3ccb6b9e088e";
    let url = "http://localhost";
    let port = 8000;

    let compreFace = new CompreFace(url, port);
    let recognitionService = compreFace.initFaceRecognitionService(api_key);

    document.addEventListener("next_frame", () => {
        btn.addEventListener("click", function () {
            btn.classList.add("hidden");
            Swal.fire({
                title: `Identifikasi`,
                text: "Harap tunggu",
                icon: "info",
            });
            let ctx = canvas.getContext("2d");
            ctx.drawImage(video, 0, 0, 400, 300);
            document.getElementById("canvas").toBlob((blob) => {
                recognitionService
                    .recognize(blob, {
                        limit: 1,
                        face_plugins: "age,gender,mask,pose",
                    })
                    .then(async (res) => {
                        const response = await fetch("/login-face", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": csrfToken,
                            },
                            body: JSON.stringify({
                                res,
                            }),
                        }).catch((error) => {
                            Swal.fire({
                                title: `${error}`,
                                text: "Mohon Pindai Kembali",
                                icon: "error",
                                confirmButtonText: "OK",
                                confirmButtonColor: "#d33",
                            });
                        });
                        const respon = await response.json();
                        if (respon.status == true) {
                            window.location.href = "/";
                        } else {
                            btn.classList.remove("hidden");
                            Swal.fire({
                                title: `Gagal Login`,
                                text: respon.message + " " + respon.masker,
                                icon: "error",
                                confirmButtonText: "OK",
                                confirmButtonColor: "#d33",
                            });
                        }
                    })
                    .catch((error) => {
                        btn.classList.remove("hidden");
                        Swal.fire({
                            title: `${error}`,
                            text: "Mohon Pindai Kembali",
                            icon: "error",
                            confirmButtonText: "OK",
                            confirmButtonColor: "#d33",
                        });
                    });
            }, "image/png");
        });
    });

    const evt = new Event("next_frame", { bubbles: true, cancelable: false });
    document.dispatchEvent(evt);
});
