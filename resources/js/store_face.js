import { CompreFace } from "@exadel/compreface-js-sdk";
import Swal from "sweetalert2";

const faceName = document.getElementById("faceName");
const btn = document.getElementById("saveFace");

function Str_Random(length) {
    let result = "";
    const characters = "abcdefghijklmnopqrstuvwxyz0123456789";

    // Loop to generate characters for the specified length
    for (let i = 0; i < length; i++) {
        const randomInd = Math.floor(Math.random() * characters.length);
        result += characters.charAt(randomInd);
    }
    return result;
}

let api_key = "27baa3c1-4970-4852-ba5b-3ccb6b9e088e";
let url = "http://localhost";
let port = 8000;

let compreFace = new CompreFace(url, port);
let recognitionService = compreFace.initFaceRecognitionService(api_key);
let faceCollection = recognitionService.getFaceCollection();

btn.addEventListener("click", () => {
    btn.classList.add("hidden");
    faceName.value = Str_Random(Math.random() * 100);
    let name = encodeURIComponent(faceName.value);
    document.getElementById("canvas").toBlob((blob) => {
        faceCollection
            .add(blob, name)
            .then((response) => {
                Swal.fire({
                    title: `Berhasil`,
                    text: "Silahkan lanjut isi form",
                    icon: "success",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#00ad31",
                });
                webcam.stop();
                document.getElementById("face_recog").classList.add("hidden");
            })
            .catch((error) => {
                faceName.value = null;
                btn.classList.remove("hidden");
                Swal.fire({
                    title: `${error}`,
                    text: "Mohon klik Simpan Foto kembali",
                    icon: "error",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#d33",
                });
            });
    }, "image/png");
});
