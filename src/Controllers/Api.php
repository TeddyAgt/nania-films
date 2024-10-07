<?php

namespace App\Controllers;

use App\Tools\Mailer;
use App\Models\Memories;

class Api
{
    public function fetchMemory()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "GET") {
            http_response_code(405);
            exit;
        } elseif (!($id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT) ?? "")) {
            http_response_code(400);
            exit;
        }

        $memory = (new Memories())->find($id);
        if ($memory) {
            header("Content-Type: application/json; charset=utf-8");
            echo json_encode($memory);
        } else {
            http_response_code(404);
            exit;
        }
    }

    public function sendMessage()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            http_response_code(405);
            exit;
        }

        $formData = json_decode(file_get_contents("php://input"), true);
        if (
            ($from = filter_var($formData["email"], FILTER_SANITIZE_EMAIL) ?? "")
            && ($message = filter_var($formData["message"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? "")
        ) {
            (new Mailer(true))->sendToContact($from, $message);
        } else {
            http_response_code(400);
            exit;
        }
    }
}
