<section class="productions-section base-section" id="news">
    <h1 class="main-title">Productions en cours</h1>


    <?php foreach ($pageContent["news"]["publications"] as $production) : ?>
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
            <?php for ($i = 1; $i <= $pageContent["news"]["nb_pages"]; $i++) : ?>
                <a
                    href="index.php?c=posts&action=productions&p=<?= $i; ?>#news"
                    class="paging__link <?= $pageContent["news"]["current_page"] === $i
                                            ? "paging__link--inactive"
                                            : ""; ?>"><?= $i ?></a><?= $i < $pageContent["news"]["nb_pages"] ? ", " : ""; ?>
            <?php endfor; ?>
        </p>
    </div>
</section>