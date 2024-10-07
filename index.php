<?php

use App\Controllers\About;
use App\Controllers\Home;
use App\Controllers\Posts;

require "vendor/autoload.php";

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

// Router **************************************************
// try {
if (($action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_SPECIAL_CHARS))) {
    switch ($action) {
        case 'about':
            (new About())->index($action);
            break;

        case "productions":
            $filmPage = filter_input(INPUT_GET, "f", FILTER_SANITIZE_NUMBER_INT) ?? 1;
            $replayPage = filter_input(INPUT_GET, "r", FILTER_SANITIZE_NUMBER_INT) ?? 1;
            (new Posts())->productions($action, $filmPage, $replayPage);
            break;

        case "news":
            $page = filter_input(INPUT_GET, "p", FILTER_SANITIZE_NUMBER_INT) ?? 1;
            (new Posts())->news($action, $page);
            break;

        case "memories":
            (new Posts())->memories($action);
            break;

        case "contact":
            (new Home())->contact($action);
            break;

        case "legals":
            (new Home())->legals($action);
            break;

        default:
            throw new Exception("La page demandée n'existe pas", 404);
            break;
    }
} else {
    (new Home())->index($action);
}
// } catch (\Exception $e) {
//     $errorCode = $e->getCode();
//     $errorMessage = $e->getMessage();
//     require("templates/error.php");
// }
