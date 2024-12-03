const sidebar = document.getElementById("logo-sidebar");
const bodyContent = document.getElementById("body-content");
const toggleSide = document.getElementById("toggle-side");

function open() {
    sidebar.classList.remove("-translate-x-full");
    bodyContent.classList.add("ml-64");
    toggleSide.classList.replace("left-0", "left-[14.3rem]");
    localStorage.setItem("aside", "open");
}

function close() {
    sidebar.classList.add("-translate-x-full");
    bodyContent.classList.remove("ml-64");
    toggleSide.classList.replace("left-[14.3rem]", "left-0");
    localStorage.setItem("aside", "closed");
}

if (localStorage.getItem("aside")) {
    if (localStorage.getItem("aside") === "open") {
        open();
    } else {
        close();
    }
} else {
    close();
}

toggleSide.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
    bodyContent.classList.toggle("ml-64");

    if (localStorage.getItem("aside")) {
        if (localStorage.getItem("aside") === "open") {
            close();
        } else {
            open();
        }
    } else {
        if (sidebar.classList.contains("-translate-x-full")) {
            close();
        } else {
            open();
        }
    }
});
