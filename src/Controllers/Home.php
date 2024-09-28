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
        $lastProductions = (new Productions())->findLasts(2);
        $lastNews = (new InProgress())->findLasts(2);
        $lastMemories = (new Memories())->findLasts(3);
        $view = "home/index.php";
        $javascript = "";
        require ROOT . "/templates/page-with-hero.php";
    }
}
