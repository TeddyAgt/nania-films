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
            (new About())->index();
            break;

        case "productions":
            (new Posts())->productions();
            break;

        default:
            throw new Exception("La page demandée n'existe pas", 404);
            break;
    }
} else {
    (new Home())->index();
}
// } catch (\Exception $e) {
//     $errorCode = $e->getCode();
//     $errorMessage = $e->getMessage();
//     require("templates/error.php");
// }
