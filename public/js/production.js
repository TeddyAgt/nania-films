const slides = [...document.querySelectorAll(".carousel__slide")];
const directionBtns = [
    ...document.querySelectorAll(".carousel__direction-btn"),
];

const carouselData = {
    direction: 0,
    slideOutIndex: 0,
    slideInIndex: 0,
    locked: false,
};

directionBtns.forEach((btn) =>
    btn.addEventListener("click", handleClickDirectionBtn)
);

function handleClickDirectionBtn(e) {
    if (carouselData.locked) return;
    carouselData.locked = true;
    setCarouselData(e.target);
    slideOut();
}

function setCarouselData(btn) {
    carouselData.direction = btn.dataset.direction === "right" ? 1 : -1;

    carouselData.slideOutIndex = slides.findIndex((slide) =>
        slide.classList.contains("carousel__slide--active")
    );

    if (
        carouselData.slideOutIndex + carouselData.direction >
        slides.length - 1
    ) {
        carouselData.slideInIndex = 0;
    } else if (carouselData.slideOutIndex + carouselData.direction < 0) {
        carouselData.slideInIndex = slides.length - 1;
    } else {
        carouselData.slideInIndex =
            carouselData.slideOutIndex + carouselData.direction;
    }
}

function slideOut() {
    slideAnimation({
        element: slides[carouselData.slideInIndex],
        properties: {
            display: "flex",
            transform: `translateX(${
                carouselData.direction < 0 ? "100%" : "-100%"
            })`,
            opacity: 0,
        },
    });
    slideAnimation({
        element: slides[carouselData.slideOutIndex],
        properties: {
            transition: "transform 0.2s ease-out, opacity 0.2s ease-out",
            transform: `translateX(${
                carouselData.direction < 0 ? "-100%" : "100%"
            })`,
            opacity: 0,
        },
    });

    slides[carouselData.slideOutIndex].addEventListener(
        "transitionend",
        slideIn
    );
}

function slideIn(e) {
    slideAnimation({
        element: slides[carouselData.slideInIndex],
        properties: {
            transition: "transform 0.2s ease-out, opacity 0.4s ease-out",
            transform: "translateX(0%)",
            opacity: 1,
        },
    });
    slides[carouselData.slideInIndex].classList.add("carousel__slide--active");
    slides[carouselData.slideOutIndex].classList.remove(
        "carousel__slide--active"
    );
    e.target.removeEventListener("transitionend", slideIn);
    setTimeout(() => {
        carouselData.locked = false;
    }, 200);
}

function slideAnimation(animationAttributes) {
    for (const prop in animationAttributes.properties) {
        animationAttributes.element.style[prop] =
            animationAttributes.properties[prop];
    }
}
