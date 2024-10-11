<?php

use App\Router\Router;

require "vendor/autoload.php";

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

// try {
(Router::getInstance())->start();
// } catch (Exception $e) {
// $errorCode = $e->getCode();
//     $errorMessage = $e->getMessage();
//     require("templates/error.php");
// }