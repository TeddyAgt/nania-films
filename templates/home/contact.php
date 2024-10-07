<h1 class="main-title">Contact</h1>
<div class="contact-section__content">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, esse inventore similique
        accusamus
        voluptatum alias recusandae numquam eveniet suscipit nam aliquam dolorum aut porro praesentium.
    </p>
    <!-- Social networks -->
    <div class="social-networks-container">
        <a href="#" class="social-networks__link" title="Visiter notre page Facebook"
            aria-label="Visiter notre page Facebook">
            <img src="public/assets/icons/facebook-white.svg" alt="" aria-hidden="true">
        </a>
        <a href="#" class="social-networks__link" title="Visiter notre compte Instagram"
            aria-label="Visiter notre compte Instagram">
            <img src="public/assets/icons/instagram-white.svg" alt="" aria-hidden="true">
        </a>
    </div>
    <!-- Contact form -->
    <form action="" method="POST" class="contact-form" id="contact-form">
        <div class="input-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="input-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message"></textarea>
        </div>
        <p class="form-error"></p>
        <button type="submit" class="btn btn--primary">Envoyer</button>
    </form>
</div>