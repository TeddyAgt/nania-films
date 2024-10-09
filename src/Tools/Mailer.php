<?php

namespace App\Tools;

use App\Tools\DotEnv;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mailer extends PHPMailer
{
    private static string $host;
    private static string $username;
    private static string $password;
    private static int $port;
    private static string $admin;


    public function __construct($exceptions = null)
    {
        parent::__construct($exceptions);

        $credentials = (new DotEnv())->getCredentials();
        self::$host = $credentials["MAIL_HOST"];
        self::$username = $credentials["MAIL_USER"];
        self::$password = $credentials["MAIL_PASSWORD"];
        self::$port = $credentials["MAIL_PORT"];
        self::$admin = $credentials["MAIL_ADMIN"];

        // $this->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->CharSet = "utf-8";
        $this->isSMTP();
        $this->SMTPAuth = true;
        $this->Host = self::$host;
        $this->Username = self::$username;
        $this->Password = self::$password;
        $this->Port = self::$port;
        $this->WordWrap = 70;
        $this->isHTML(true);
    }

    public function sendFromAdmin(string $to, string $subject, string $message, array $options = null)
    {
        try {
            $this->setFrom(self::$admin);
            $this->addAddress($to);
            $this->Subject = $subject;
            ob_start();
            require_once "templates/mails/from-admin.php";
            $body = ob_get_clean();
            $this->msgHTML($body);
            $this->send();
        } catch (Exception $e) {
            header("Cache-Control: no-cache");
            header("Retry-After: 120");
            http_response_code(503);
            die;
        }
    }

    public function sendToContact(string $from, string $message)
    {
        try {
            $this->setFrom($from);
            $this->addAddress("contact@nania-films.fr");
            $this->Subject = "Contact via nania-films.fr";
            ob_start();
            require_once "templates/mails/to-contact.php";
            $body = ob_get_clean();
            $this->msgHTML($body);
            if ($this->send()) {
                $this->sendFromContact($from, $message);
            } else {
                throw new Exception($this->ErrorInfo);
            }
        } catch (Exception $e) {
            header("Cache-Control: no-cache");
            header("Retry-After: 120");
            http_response_code(503);
            die;
        }
    }

    public function sendFromContact(string $to, string $message)
    {
        try {
            $this->setFrom("do-not-reply@nania-films.fr");
            $this->clearAllRecipients();
            $this->addAddress($to);
            $this->Subject = "Nania Films - Message délivré";
            ob_start();
            require_once "templates/mails/from-contact.php";
            $body = ob_get_clean();
            $this->msgHTML($body);
            $this->send();
        } catch (Exception $e) {
            header("Cache-Control: no-cache");
            header("Retry-After: 120");
            http_response_code(503);
            die;
        }
    }
}
