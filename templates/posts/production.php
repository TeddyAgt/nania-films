<section class="production-section">
    <h1 class="main-title"><?= $production->title; ?></h1>

    <div class="production-container">
        <video class="production-section__player" controls>
            <source src="<?= $production->content->video_source; ?>" type="video/mp4">
        </video>

        <p class="production-details"><?= $production->content->details; ?></p>
        <p class="production-description"><?= $production->content->text; ?></p>

        <?php if (count($production->content->medias)) : ?>
            coucou
            <ul class="production-gallery">
                <?php foreach ($production->content->medias as $media) : ?>
                    <li class="production-gallery__item">
                        <a href="public/assets/images/pictures/<?= $media->name; ?>"><img
                                src="public/assets/images/pictures/<?= $media->name; ?>" alt=""></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
</section>
</div>