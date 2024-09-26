const memoryCards = [...document.querySelectorAll(".memories-list__item")];

const memories = [
    {
        id: 1,
        text: "Aka arracacha artichoke arugula azuki bamboo beet bell brinjal brussels canna cardoon chaya chestnut chinese choy collard courgette dandelion earthnut endive epazote garlic ginger golden greater gumbo henry horseradish.",
        media: "memo1.jpg",
    },
    {
        id: 2,
        text: "Aka arracacha artichoke arugula azuki bamboo beet bell brinjal brussels canna cardoon chaya chestnut chinese choy collard courgette dandelion earthnut endive epazote garlic ginger golden greater gumbo henry horseradish.",
        media: "memo2.jpg",
    },
    {
        id: 3,
        text: "Aka arracacha artichoke arugula azuki bamboo beet bell brinjal brussels canna cardoon chaya chestnut chinese choy collard courgette dandelion earthnut endive epazote garlic ginger golden greater gumbo henry horseradish.",
        media: "memo3.jpg",
    },
    {
        id: 4,
        text: "Aka arracacha artichoke arugula azuki bamboo beet bell brinjal brussels canna cardoon chaya chestnut chinese choy collard courgette dandelion earthnut endive epazote garlic ginger golden greater gumbo henry horseradish.",
        media: "memo4.jpg",
    },
    {
        id: 5,
        text: "Aka arracacha artichoke arugula azuki bamboo beet bell brinjal brussels canna cardoon chaya chestnut chinese choy collard courgette dandelion earthnut endive epazote garlic ginger golden greater gumbo henry horseradish.",
        media: "memo5.jpg",
    },
    {
        id: 6,
        text: "Aka arracacha artichoke arugula azuki bamboo beet bell brinjal brussels canna cardoon chaya chestnut chinese choy collard courgette dandelion earthnut endive epazote garlic ginger golden greater gumbo henry horseradish.",
        media: "memo6.jpg",
    },
    {
        id: 7,
        text: "Aka arracacha artichoke arugula azuki bamboo beet bell brinjal brussels canna cardoon chaya chestnut chinese choy collard courgette dandelion earthnut endive epazote garlic ginger golden greater gumbo henry horseradish.",
        media: "memo7.jpg",
    },
    {
        id: 8,
        text: "Aka arracacha artichoke arugula azuki bamboo beet bell brinjal brussels canna cardoon chaya chestnut chinese choy collard courgette dandelion earthnut endive epazote garlic ginger golden greater gumbo henry horseradish.",
        media: "memo8.jpg",
    },
    {
        id: 9,
        text: "Aka arracacha artichoke arugula azuki bamboo beet bell brinjal brussels canna cardoon chaya chestnut chinese choy collard courgette dandelion earthnut endive epazote garlic ginger golden greater gumbo henry horseradish.",
        media: "memo9.jpg",
    },
];

memoryCards.forEach((card) =>
    card.addEventListener("click", handleClickMemoryCard)
);

function handleClickMemoryCard(e) {
    // Ici on récupérera le souvenir en ajax
    memory = memories[e.target.dataset.memoId - 1];
    // Puis on appelera la fonction d'affichage
    showMemory(memory);
}

function showMemory(memory) {
    const overlay = document.createElement("div");
    overlay.classList.add("overlay");
    overlay.addEventListener("click", closeOverlay);
    const closeBtn = document.createElement("button");
    closeBtn.classList.add("overlay__close-btn");
    closeBtn.ariaLabel = "Fermer la photo";
    closeBtn.innerHTML =
        '<img src="assets/icons/close-white.svg" aria-hidden="true" alt="">';
    closeBtn.addEventListener("click", closeOverlay);
    overlay.appendChild(closeBtn);
    const content = document.createElement("div");
    content.classList.add("overlay__content");
    content.innerHTML = `<img src="assets/img/${memory.media}" alt="">`;
    content.addEventListener("click", (e) => e.stopPropagation());
    overlay.appendChild(content);
    document.body.appendChild(overlay);
}

function closeOverlay() {
    document.querySelector(".overlay").remove();
}
