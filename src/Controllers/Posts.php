<?php

namespace App\Controllers;

use App\Models\InProgress;
use App\Models\Memories;
use App\Models\Posts as ModelsPosts;
use App\Models\Productions;
use App\Models\Replays;

class Posts
{
    public function productions(int $f = 1, int $r = 1, string $action = "productions")
    {
        $filmPage = filter_var($f, FILTER_SANITIZE_NUMBER_INT) ?? 1;
        $replayPage = filter_var($r, FILTER_SANITIZE_NUMBER_INT) ?? 1;

        $productionsModel = new Productions();
        $replaysModel = new Replays();
        $css = '<link rel="stylesheet" href="public/css/productions.css">';
        $title = "Nos réalisations";
        $pageContent = [
            "productions" => [
                "nb_pages" => $productionsModel->countPages(),
                "current_page" => $filmPage,
                "publications" => $productionsModel->findByPage($filmPage, true)
            ],
            "replays" => [
                "nb_pages" => $replaysModel->countpages(),
                "current_page" => $replayPage,
                "publications" => $replaysModel->findByPage($replayPage, true)
            ]
        ];
        $view = "posts/productions.php";
        $javascript = "";
        require ROOT . "/templates/no-hero-page.php";
    }

    public function production(int $id, string $action = "production")
    {
        $production = (new Productions())->find($id);
        $title = $production->title;
        $css = '<link rel="stylesheet" href="public/css/production.css">';
        $javascript = '<script src="public/js/production.js"></script>';
        $view = "posts/production.php";
        require ROOT . "/templates/no-hero-page.php";
    }

    public function news(int $p = 1, string $action = "news")
    {
        $page = filter_var($p, FILTER_SANITIZE_NUMBER_INT) ?? 1;
        $newsModel = new InProgress();
        $css = '<link rel="stylesheet" href="public/css/productions.css">';
        $title = "Productions en cours";
        $pageContent = [
            "news" => [
                "nb_pages" => $newsModel->countPages(),
                "current_page" => $page,
                "publications" => $newsModel->findByPage($page, true)
            ]
        ];
        $view = "posts/news.php";
        $javascript = "";
        require ROOT . "/templates/no-hero-page.php";
    }

    public function memories(string $action = "memories")
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
        $memories = (new Memories())->findAll(true);
        $view = "posts/memories.php";
        $javascript = '<script src="public/js/memories.js"></script>';
        require ROOT . "/templates/page-with-hero.php";
    }
}
