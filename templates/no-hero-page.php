<!DOCTYPE html>
<html lang="fr">

<?php require_once ROOT . "/templates/includes/head.php"; ?>

<body>
    <?php require_once ROOT . "/templates/includes/header.php"; ?>

    <main>
        <?php require_once ROOT . "/templates/$view"; ?>
    </main>

    <?php require_once ROOT . "/templates/includes/footer.php"; ?>
    <script src="public/js/app.js"></script>
</body>

</html>