<section class="production-section">
    <h1 class="main-title"><?= $production->title; ?></h1>

    <div class="production-container">
        <video class="production-section__player" poster="public/assets/images/thumbs/<?= $production->content->thumb; ?>" controls>
            <source src="<?= $production->content->video_source; ?>" type="video/mp4">
        </video>

        <p class="production-details"><?= $production->content->details; ?></p>
        <p class="production-description"><?= $production->content->text; ?></p>

        <?php if (count($production->content->medias) > 1) :
            $medias = $production->content->medias; ?>

            <div class="carousel-container">
                <button class="carousel__direction-btn carousel__direction-btn--left" data-direction="left"
                    aria-label="Photo précédente">
                    <img src="public/assets/icons/chevron-left.svg" alt="">
                </button>
                <button class="carousel__direction-btn carousel__direction-btn--right" data-direction="right"
                    aria-label="Photo précédente">
                    <img src="public/assets/icons/chevron-right.svg" alt="">
                </button>

                <?php for ($i = 1; $i <= count($medias); $i++) : ?>
                    <div class="carousel__slide carousel__slide--<?= $i; ?> <?= $i === 1 ? "carousel__slide--active" : ""; ?>" data-slide="<?= $i; ?>">
                        <img src="public/assets/images/pictures/<?= $medias[$i - 1]->name; ?>" alt="" class="carousel__picture">
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
            </div>
    </div>
</section>