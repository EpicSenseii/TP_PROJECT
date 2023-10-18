const openModalBtn = document.getElementById("open-modal-btn");
const closeBtn = document.getElementsByClassName("close-btn");
const modalContainer = document.getElementById("modal-container");

function closeModal() {
    modalContainer.style.display = "none";
}

openModalBtn.addEventListener("click", function () {
    modalContainer.style.display = "block";
});

for (let btn of closeBtn) {
    btn.addEventListener("click", closeModal);
}

window.addEventListener("click", function (event) {
    if (event.target === modalContainer) {
        closeModal();
    }
});

window.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        closeModal();
    }
});
