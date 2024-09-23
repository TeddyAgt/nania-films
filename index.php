<?php

use App\Controllers\Home;

require "vendor/autoload.php";

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

// Router **************************************************
// try {
if (($action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_SPECIAL_CHARS))) {
    // ici le switch
} else {
    (new Home())->index();
}
// } catch (\Exception $e) {
//     $errorCode = $e->getCode();
//     $errorMessage = $e->getMessage();
//     require("templates/error.php");
// }
