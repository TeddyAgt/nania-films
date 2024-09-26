const mobileNavigation = document.querySelector(".main-navigation");
const mobileNavigationOpenBtn = document.querySelector(
    ".mobile-navigation__open-btn"
);
const mobileNavigationCloseBtn = document.querySelector(
    ".mobile-navigation__close-btn"
);

mobileNavigationOpenBtn.addEventListener("click", (e) =>
    toggleMobileNavigation(e, false)
);

mobileNavigationCloseBtn.addEventListener("click", (e) =>
    toggleMobileNavigation(e, true)
);

function toggleMobileNavigation(e, open) {
    if (open) {
        mobileNavigation.classList.remove("mobile-navigation--active");
    } else {
        mobileNavigation.classList.add("mobile-navigation--active");
    }
}
