<!-- Memories section -->
<section class="memories-section base-section" id="memories-section">
    <ul class="memories-list">
        <?php foreach ($memories as $memory) : ?>
            <li class="memories-list__item">
                <img
                    src="public/assets/images/pictures/<?= $memory->content->medias[0]->name; ?>"
                    alt=""
                    class="memories-item__img">
                <div class="memories-item__overlay" data-memo-id="<?= $memory->id; ?>">
                    <h2 class="memories-item__title"><?= $memory->title; ?></h2>
                    <p class="memories-item__date"><?= date_format(date_create($memory->creation_date), "d/m/Y"); ?></p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

</section>