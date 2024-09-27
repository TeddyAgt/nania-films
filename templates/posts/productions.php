<section class="productions-section base-section">
    <h1 class="main-title">Nos réalisations</h1>

    <!-- Movies subsection -->
    <section class="movies-subsection">
        <h2 class="section-title">Nos films</h2>

        <?php foreach ($productions as $production) : ?>
            <article class="movie-article">
                <div class="movie-article__thumb">
                    <img src="public/assets/images/thumbs/<?= $production->content->thumb; ?>" alt="">
                </div>

                <div class="movie-article__content">
                    <h3 class="article-title"><?= $production->title; ?></h3>
                    <p class="movie-article__details details"><?= $production->content->details; ?></p>
                    <p><?= $production->content->text; ?></p>
                    <a href="index.php?=action=production&id=<?= $production->id; ?>" class="btn btn--primary">Voir la fiche</a>
                </div>
            </article>
        <?php endforeach; ?>

        <div class="paging">
            <p>1, <a href="#" class="paging__link">2</a>, <a href="#" class="paging__link">fin</a></p>
        </div>
    </section>

    <!-- Replays subsection -->
    <section class="replays-subsection">
        <h2 class="section-title">Replays</h2>

        <?php foreach ($replays as $replay) : ?>
            <article class="movie-article">
                <div class="movie-article__thumb">
                    <img src="public/assets/images/thumbs/<?= $replay->content->thumb; ?>" alt="">
                </div>

                <div class="movie-article__content">
                    <h3 class="article-title"><?= $replay->title; ?></h3>
                    <p class="movie-article__details details"><?= $replay->content->details; ?></p>
                    <p><?= $replay->content->text; ?></p>
                    <a href="<?= $replay->content->url; ?>" class="btn btn--primary">Voir</a>
                </div>
            </article>
        <?php endforeach; ?>

        <div class="paging">
            <p>1, <a href="#" class="paging__link">2</a>, <a href="#" class="paging__link">fin</a></p>
        </div>
    </section>

</section>