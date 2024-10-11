<section class="productions-section base-section">
    <h1 class="main-title">Nos réalisations</h1>

    <!-- Movies subsection -->
    <section class="movies-subsection" id="movies">
        <h2 class="section-title">Nos films</h2>

        <?php foreach ($pageContent["productions"]["publications"] as $production) : ?>
            <article class="movie-article">
                <div class="movie-article__thumb">
                    <img src="public/assets/images/thumbs/<?= $production->content->thumb; ?>" alt="">
                </div>

                <div class="movie-article__content">
                    <h3 class="article-title"><?= $production->title; ?></h3>
                    <p class="movie-article__details details"><?= $production->content->details; ?></p>
                    <p><?= $production->content->text; ?></p>
                    <a
                        href="index.php?=c=posts&action=production&id=<?= $production->id; ?>"
                        class="btn btn--primary">Voir la fiche
                    </a>
                </div>
            </article>
        <?php endforeach; ?>

        <div class="paging">
            <p>
                <?php for ($i = 1; $i <= $pageContent["productions"]["nb_pages"]; $i++) : ?>
                    <a
                        href="index.php?c=posts&action=productions&f=<?= $i; ?>&r=<?= $pageContent["replays"]["current_page"]; ?>#movies"
                        class="paging__link <?= $pageContent["productions"]["current_page"] === $i
                                                ? "paging__link--inactive"
                                                : ""; ?>"><?= $i ?></a><?= $i < $pageContent["productions"]["nb_pages"] ? ", " : ""; ?>
                <?php endfor; ?>
            </p>
        </div>
    </section>

    <!-- Replays subsection -->
    <section class="replays-subsection" id="replays">
        <h2 class="section-title">Replays</h2>

        <?php foreach ($pageContent["replays"]["publications"] as $replay) : ?>
            <article class="movie-article">
                <div class="movie-article__thumb">
                    <img src="public/assets/images/thumbs/<?= $replay->content->thumb; ?>" alt="">
                </div>

                <div class="movie-article__content">
                    <h3 class="article-title"><?= $replay->title; ?></h3>
                    <p class="movie-article__details details"><?= $replay->content->details; ?></p>
                    <p><?= $replay->content->text; ?></p>
                    <a href="<?= $replay->content->url; ?>" class="btn btn--primary" target="_blank">Voir</a>
                </div>
            </article>
        <?php endforeach; ?>

        <div class="paging">
            <p>
                <?php for ($i = 1; $i <= $pageContent["replays"]["nb_pages"]; $i++) : ?>
                    <a
                        href="index.php?c=posts&action=productions&r=<?= $i; ?>&f=<?= $pageContent["productions"]["current_page"]; ?>#replays"
                        class="paging__link <?= $pageContent["replays"]["current_page"] === $i
                                                ? "paging__link--inactive"
                                                : ""; ?>"><?= $i ?></a><?= $i < $pageContent["replays"]["nb_pages"] ? ", " : ""; ?>
                <?php endfor; ?>
            </p>
        </div>
    </section>

</section>