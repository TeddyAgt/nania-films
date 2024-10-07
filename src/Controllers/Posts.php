<?php

namespace App\Controllers;

use App\Models\InProgress;
use App\Models\Memories;
use App\Models\Posts as ModelsPosts;
use App\Models\Productions;
use App\Models\Replays;

class Posts
{
    public function productions(string $action, int $filmPage = 1, int $replayPage = 1)
    {
        $productionsModel = new Productions();
        $replaysModel = new Replays();
        $css = '<link rel="stylesheet" href="public/css/productions.css">';
        $title = "Nos réalisations";
        $pageContent = [
            "productions" => [
                "nb_pages" => $productionsModel->countPages(),
                "current_page" => $filmPage,
                "publications" => $productionsModel->findByPage($filmPage)
            ],
            "replays" => [
                "nb_pages" => $replaysModel->countpages(),
                "current_page" => $replayPage,
                "publications" => $replaysModel->findByPage($replayPage)
            ]
        ];
        $view = "posts/productions.php";
        $javascript = "";
        require ROOT . "/templates/no-hero-page.php";
    }

    public function news(string $action, int $page = 1)
    {
        $newsModel = new InProgress();
        $css = '<link rel="stylesheet" href="public/css/productions.css">';
        $title = "Productions en cours";
        $pageContent = [
            "news" => [
                "nb_pages" => $newsModel->countPages(),
                "current_page" => $page,
                "publications" => $newsModel->findByPage($page)
            ]
        ];
        $view = "posts/news.php";
        $javascript = "";
        require ROOT . "/templates/no-hero-page.php";
    }

    public function memories(string $action)
    {
        $css = '<link rel="stylesheet" href="public/css/memories.css">';
        $title = "Souvenirs de tournage";
        $hero = [
            "background" => "memories.mp4",
            "text" => "Souvenirs",
            "cta" => '<a href="#memories-section" class="hero-section__down-btn" aria-hidden="true">
                        <img src="assets/icons/chevron-down.svg" aria-hidden="true" alt="">
                        </a>'
        ];
        $memories = (new Memories())->findAll();
        $view = "posts/memories.php";
        $javascript = '<script src="public/js/memories.js"></script>';
        require ROOT . "/templates/page-with-hero.php";
    }
}
