<!-- About section -->
<section class="about-section base-section">
    <div class="about-section__picture-container">
        <img src="public/assets/images/pictures/1727094905.jpg" alt="">
    </div>
    <div class="about-section__content-container">
        <h2 class="section-title">Quelques mots sur nous</h2>
        <div class="about-section__text">
            <p>Comment être sûr de porter des sujets et des valeurs conformes à notre façon de voir le monde ?
                Sans
                partis pris mais avec poésie !</p>
            <p>Comment faire partager au plus grand nombre une vision des gens, des territoires ou des peuples ?
            </p>
            <p>Comment éveiller les téléspectateurs, de plus en plus habitués à consommer des programmes TV «
                fast-food », à une information de qualité garantie sans fake-news ?</p>
        </div>
        <a
            href="index.php?action=about"
            class="btn btn--secondary btn--big"
            title="Qui sommes nous ?">Qui sommes nous ?
        </a>
    </div>
</section>

<!-- Productions section -->
<section class="productions-section base-section">
    <h2 class="section-title">Dernières réalisations</h2>
    <?php foreach ($lastProductions as $production) : ?>
        <article class="movie-article">
            <div class="movie-article__thumb">
                <img src="public/assets/images/thumbs/<?= $production->content->thumb; ?>" alt="">
            </div>

            <div class="movie-article__content">
                <h3 class="article-title"><?= $production->title; ?></h3>
                <p class="movie-article__details details"><?= $production->content->details; ?></p>
                <!-- <p><?= $production->content->text; ?></p> -->
                <?= $production->content->text; ?>
                <a
                    href="index.php?action=production&id=<?= $production->id; ?>"
                    class="btn btn--primary" title="Voir la fiche">Voir la fiche
                </a>
            </div>
        </article>
    <?php endforeach; ?>
    <a href="index.php?action=productions" class="btn btn--secondary btn--big">Voir toutes nos réalisations</a>
</section>

<!-- News section -->
<section class="news-section base-section">
    <h2 class="section-title">Actus</h2>
    <?php foreach ($lastNews as $news) : ?>
        <article class="movie-article">
            <div class="movie-article__thumb">
                <img src="public/assets/images/thumbs/<?= $news->content->thumb; ?>" alt="">
            </div>

            <div class="movie-article__content">
                <h3 class="article-title"><?= $news->title; ?></h3>
                <p class="movie-article__details details"><?= $news->content->details; ?></p>
                <p><?= $news->content->text; ?></p>
                <a
                    href="index.php?action=production&id=<?= $news->id; ?>"
                    class="btn btn--primary"
                    title="Voir la fiche">Voir la fiche
                </a>
            </div>
        </article>
    <?php endforeach; ?>
    <a href="index.php?action=news" class="btn btn--secondary btn--big">Voir toutes les actus</a>
</section>

<!-- Memories section -->
<section class="memories-section base-section">
    <h2 class="section-title">Souvenirs de tournage</h2>
    <ul class="memories-list">
        <?php foreach ($lastMemories as $memory) : ?>
            <li class="memories-list__item">
                <img
                    src="public/assets/images/pictures/<?= $memory->content->medias[0]->name; ?>"
                    alt=""
                    class="memories-item__img">
                <div class="memories-item__overlay" data-memo-id="<?= $memory->id; ?>">
                    <h2 class="memories-item__title"><?= $memory->title; ?></h2>
                    <p class="memories-item__date"><?= date_format(date_create($memory->creation_date), "d/m/Y") ?></p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=memories" class="btn btn--secondary btn--big">Voir tous les souvenirs</a>
</section>

<!-- Contact section -->
<section class="contact-section base-section">
    <h2 class="section-title">Contact</h2>

    <div class="contact-section__left-content">
        <div class="social-networks-container">
            <a href="https://www.facebook.com/Nania.Films/" target="_blank" class="social-networks__link"
                title="Visiter notre page Facebook" aria-label="Visiter notre page Facebook">
                <img src="public/assets/icons/facebook.svg" alt="" aria-hidden="true">
            </a>
            <a href="https://www.instagram.com/nania.films/" target="_blank" class="social-networks__link"
                title="Visiter notre compte Instagram" aria-label="Visiter notre compte Instagram">
                <img src="public/assets/icons/instagram.svg" alt="" aria-hidden="true">
            </a>
        </div>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem eligendi officia, odio repellendus
            dolorum neque atque repudiandae. Alias dolorum nemo tenetur, sed ut reprehenderit quidem.</p>
    </div>

    <div class="contact-section__right-content">
        <form action="" method="POST" class="contact-section__form">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                <p class="form-error"></p>
            </div>

            <div class="input-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message"></textarea>
                <p class="form-error"></p>
            </div>

            <button type="submit" class="btn btn--primary">Envoyer</button>
        </form>
    </div>
</section>