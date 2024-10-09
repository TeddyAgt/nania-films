const contactForm = document.querySelector("#contact-form");
const formMsg = document.querySelector(".form-message");
const loader = document.querySelector(".loader");
let sending = false;

contactForm.addEventListener("submit", handleSubmitContactForm);

async function handleSubmitContactForm(e) {
    e.preventDefault();
    if (sending) return;
    sending = true;
    formMsg.textContent = "";
    loader.classList.add("loader--active");

    if (!contactForm[0].value || !contactForm[1].value) {
        loader.classList.remove("loader--active");
        formMsg.textContent = "Tous les champs sont requis";
        sending = false;
        return;
    } else if (
        !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/g.test(
            contactForm[0].value
        )
    ) {
        loader.classList.remove("loader--active");
        formMsg.textContent = "Adresse mail invalide";
        sending = false;
        return;
    } else {
        try {
            const response = await fetch("api.php?action=sendMessage", {
                method: "POST",
                headers: {
                    "Content-type": "application/json",
                },
                body: JSON.stringify({
                    email: contactForm[0].value,
                    message: contactForm[1].value,
                }),
            });

            if (response.ok) {
                loader.classList.remove("loader--active");
                formMsg.textContent = "Message envoyé avec succès";
                sending = false;
            } else {
                throw new Error(
                    "Le message ne s'est pas envoyé correctement, veuillez réessayer plus tard"
                );
            }
        } catch (e) {
            loader.classList.remove("loader--active");
            formMsg.textContent = e;
            sending = false;
            return;
        }
    }
}
