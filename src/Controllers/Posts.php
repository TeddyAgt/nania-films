<?php

namespace App\Controllers;

use App\Models\Productions;
use App\Models\Replays;

class Posts
{
    public function productions(int $page = 1)
    {
        $css = '<link rel="stylesheet" href="public/css/productions.css">';
        $title = "Nos réalisations";
        $productions = (new Productions())->findByPage($page);
        $replays = (new Replays())->findByPage($page);
        $view = "posts/productions.php";
        $javascript = "";
        require ROOT . "/templates/no-hero-page.php";
    }

    public function news() {}

    public function memories() {}
}
