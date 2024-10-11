<?php

namespace App\Controllers;

class About
{
    public function index($action = "about")
    {
        $css = '<link rel="stylesheet" href="public/css/about.css">';
        $title = "Qui sommes nous";
        $hero = [
            "background" => "about.mp4",
            "text" => "Qui sommes nous ?",
            "cta" => '<a href="#history-section" class="hero-section__down-btn" aria-hidden="true">
                    <img src="public/assets/icons/chevron-down.svg" aria-hidden="true" alt="">
                </a>'
        ];
        $view = "about/index.php";
        $javascript = '<script src="public/js/about.js"></script>';

        require ROOT . "/templates/page-with-hero.php";
    }
}
