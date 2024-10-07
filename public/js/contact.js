const contactForm = document.querySelector("#contact-form");
const formMsg = document.querySelector(".form-error");

contactForm.addEventListener("submit", handleSubmitContactForm);

async function handleSubmitContactForm(e) {
    e.preventDefault();

    if (!contactForm[0].value || !contactForm[1].value) {
        formMsg.textContent = "Tous les champs sont requis";
        return;
    } else if (
        !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/g.test(
            contactForm[0].value
        )
    ) {
        formMsg.textContent = "Adresse mail invalide";
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
                formMsg.textContent = "Message envoyé avec succès";
            } else {
                throw new Error(
                    "Le message ne s'est pas envoyé correctement, veuillez réessayer plus tard"
                );
            }
        } catch (e) {
            formMsg.textContent = e;
            return;
        }
    }
}
