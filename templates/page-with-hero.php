<!DOCTYPE html>
<html lang="fr">

<?php require_once ROOT . "/templates/includes/head.php"; ?>

<body>

    <!-- Header -->
    <?php require_once ROOT . "/templates/includes/header.php"; ?>
    <main>
        <!-- Hero section -->
        <section class="hero-section">

            <video autoplay muted loop class="hero-section__background-video">
                <source src="public/assets/videos/<?= $hero["background"]; ?>" type="video/mp4">
            </video>

            <div class="hero-section__content">
                <h1 class="hero-section__title"><?= $hero["text"]; ?></h1>
                <?= isset($hero["cta"]) ? $hero["cta"] : ""; ?>
            </div>
        </section>

        <!-- Page content -->
        <?php require_once ROOT . "/templates/$view"; ?>
    </main>

    <!-- Footer -->
    <?php
    require_once ROOT . "/templates/includes/footer.php";
    echo isset($javascript) ? $javascript : "";
    ?>

    <script src="public/js/app.js"></script>
</body>

</html>