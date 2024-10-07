<!DOCTYPE html>
<html lang="fr">

<?php require_once ROOT . "/templates/includes/head.php"; ?>

<body>
    <?php require_once ROOT . "/templates/includes/header.php"; ?>
    <main>
        <section class="hero-section hero-section--only <?= $section; ?>">

            <video autoplay muted loop class="hero-section__background-video">
                <source src="public/assets/videos/<?= $hero["background"]; ?>" type="video/mp4">
            </video>

            <div class="hero-section__content">

                <!-- Page content -->
                <?php require_once ROOT . "/templates/$view"; ?>

            </div>
        </section>
    </main>
    <?php
    require_once ROOT . "/templates/includes/footer.php";
    echo isset($javascript) ? $javascript : "";
    ?>
    <script src="public/js/app.js"></script>
</body>

</html>