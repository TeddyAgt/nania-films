const memoryCards = [...document.querySelectorAll(".memories-list__item")];

memoryCards.forEach((card) =>
    card.addEventListener("click", handleClickMemoryCard)
);

async function handleClickMemoryCard(e) {
    memoryId = e.target.dataset.memoId;

    try {
        const response = await fetch(
            `api.php?action=fetchMemory&id=${memoryId}`
        );

        if (response.ok) {
            const memory = await response.json();
            console.log(memory);
            showMemory(memory);
        }
    } catch (error) {
        console.log(error);
    }
}

function showMemory(memory) {
    const overlay = document.createElement("div");
    overlay.classList.add("overlay");
    overlay.addEventListener("click", closeOverlay);
    const closeBtn = document.createElement("button");
    closeBtn.classList.add("overlay__close-btn");
    closeBtn.ariaLabel = "Fermer la photo";
    closeBtn.innerHTML =
        '<img src="public/assets/icons/close-white.svg" aria-hidden="true" alt="">';
    closeBtn.addEventListener("click", closeOverlay);
    overlay.appendChild(closeBtn);
    const content = document.createElement("div");
    content.classList.add("overlay__content");
    content.innerHTML = `<img src="public/assets/images/pictures/${memory.content.medias[0].name}" alt="${memory.title}">`;
    content.addEventListener("click", (e) => e.stopPropagation());
    overlay.appendChild(content);
    document.body.appendChild(overlay);
}

function closeOverlay() {
    document.querySelector(".overlay").remove();
}
