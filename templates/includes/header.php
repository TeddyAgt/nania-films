<header class="header">
    <a href="/" class="header__logo" title="Accueil">Nania Films</a>

    <button class="mobile-navigation__open-btn" aria-label="Ouvrir le menu de navigation"
        aria-controls="main-navigation" aria-expanded="false">
        <img src="public/assets/icons/menu.svg" aria-hidden="true" alt="">
    </button>

    <nav class="main-navigation" id="main-navigation">
        <button class="mobile-navigation__close-btn" aria-label="Fermer le menu de navigation"
            aria-controls="main-navigation" aria-expanded="true">
            <img src="public/assets/icons/close-white.svg" aria-hidden="true" alt="">
        </button>

        <a href="index.php?action=about" class="main-navigation__link <?= $action === "about" ? "main-navigation__link--active" : ""; ?>" title="Qui sommes nous ?">Qui sommes nous</a>
        <a href="index.php?action=productions" class="main-navigation__link <?= $action === "productions" ? "main-navigation__link--active" : ""; ?>" title="Voir nos réalisations">Réalisations</a>
        <a href="index.php?action=news" class="main-navigation__link <?= $action === "news" ? "main-navigation__link--active" : ""; ?>" title="Voir les films en cours de production">Actus</a>
        <a href="index.php?action=memories" class="main-navigation__link <?= $action === "memories" ? "main-navigation__link--active" : ""; ?>" title="Voir les souvenirs de tournage">Souvenirs</a>
        <a href="index.php?action=business" class="main-navigation__link <?= $action === "business" ? "main-navigation__link--active" : ""; ?>" title="Nos services">Entreprises</a>
        <a href="index.php?action=contact" class="main-navigation__link <?= $action === "contact" ? "main-navigation__link--active" : ""; ?>" title="Contactez-nous">Contact</a>
    </nav>
</header>