<?php

namespace App\Controllers;

use App\Models\InProgress;
use App\Models\Memories;
use App\Models\Productions;

class Home
{
    public function index($action)
    {
        $css = '<link rel="stylesheet" href="public/css/index.css">';
        $title = "Accueil";
        $hero = [
            "background" => "home.mp4",
            "text" => "Raconter de belles histoires",
            "cta" => '<a href="index.php?action=productions" class="btn btn--primary btn--hero">Réalisations</a>'
        ];
        $lastProductions = (new Productions())->findLasts(2, true);
        $lastNews = (new InProgress())->findLasts(2, true);
        $lastMemories = (new Memories())->findLasts(3, true);
        $view = "home/index.php";
        $javascript = '<script src="public/js/contact.js"></script>';

        require ROOT . "/templates/page-with-hero.php";
    }

    public function contact($action)
    {
        $css = '<link rel="stylesheet" href="public/css/contact.css">';
        $title = "Contact";
        $hero = ["background" => "contact.mp4"];
        $section = "contact-section";
        $view = "home/contact.php";
        $javascript = '<script src="public/js/contact.js"></script>';

        require ROOT . "/templates/hero-only-page.php";
    }

    public function legals($action)
    {
        $css = '<link rel="stylesheet" href="public/css/legals.css">';
        $title = "Mentions légales";

        require ROOT . "/templates/legals.php";
    }
}
