<?php

use App\Controllers\Api;

require "vendor/autoload.php";

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

// try {
if (($action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_SPECIAL_CHARS))) {
    if (method_exists(Api::class, $action)) {
        (new Api())->$action();
    } else {
        http_response_code(400);
        exit;
    }
} else {
    http_response_code(400);
    exit;
}
// } catch (\Throwable $th) {
//     //throw $th;
// }
