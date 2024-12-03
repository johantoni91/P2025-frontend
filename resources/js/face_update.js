import { CompreFace } from "@exadel/compreface-js-sdk";
import Swal from "sweetalert2";

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

const faceStored = document.getElementById("faceStored");
const faceName = document.getElementById("faceName");
const btn = document.getElementById("saveFace");
const take = document.getElementById("take");
const faceNotif = document.getElementById("faceNotif");

let api_key = "27baa3c1-4970-4852-ba5b-3ccb6b9e088e";
let url = "http://localhost";
let port = 8000;

let compreFace = new CompreFace(url, port);
let recognitionService = compreFace.initFaceRecognitionService(api_key);
let deleteSubject = recognitionService.getSubjects();
let faceCollection = recognitionService.getFaceCollection();

btn.addEventListener("click", () => {
    btn.classList.add("hidden");
    take.classList.add("hidden");
    faceNotif.classList.remove("hidden");

    Swal.fire({
        title: `Menyimpan Foto`,
        text: "Harap tunggu",
        icon: "info",
    });

    if (faceStored.value != '') {
        deleteSubject
            .delete(faceStored)
            .then((res) => {
            })
            .catch((err) => console.error(err));
    }

    faceName.value = Str_Random(Math.random() * 100);
                let name = encodeURIComponent(faceName.value);
    
                document.getElementById("canvas").toBlob((blob) => {
                    faceCollection
                        .add(blob, name)
                        .then((response) => {
                            document
                                .getElementById("face_recog")
                                .classList.add("hidden");
                            webcam.stop();
                            Swal.fire({
                                title: `Berhasil`,
                                text: "Silahkan lanjut isi form",
                                icon: "success",
                                confirmButtonText: "OK",
                                confirmButtonColor: "#00ad31",
                            });
                        })
                        .catch((error) => {
                            faceName.value = null;
                            btn.classList.remove("hidden");
                            take.classList.remove("hidden");
                            faceNotif.classList.add("hidden");
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
