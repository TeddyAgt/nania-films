<?php

namespace App\Controllers;

class Home
{
    public function index()
    {
        $css = '<link rel="stylesheet" href="public/css/index.css">';
        $title = "Accueil";
        $hero = [
            "background" => "home.mp4",
            "text" => "Raconter de belles histoires",
            "cta" => '<a href="index.php?action=productions" class="btn btn--primary btn--hero">Réalisations</a>'
        ];
        $view = "home/index.php";
        $javascript = "";

        require ROOT . "/templates/page-with-hero.php";
    }
}
