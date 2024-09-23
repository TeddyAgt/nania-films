<?php

namespace App\Tools;

class Host extends \PDO
{
    private static $instance;
    private string $db_host;
    private string $db_name;
    private string $db_user;
    private string $db_password;

    private function __construct()
    {
        $db_host = getenv("DB_HOST");
        $db_name = getenv("DB_NAME");
        $db_user = getenv("DB_USER");
        $db_password = getenv("DB_PASSWORD");

        $_dsn = "mysql:dbname=" . self::$db_name . ";host=" . self::$db_host;

        try {
            parent::__construct($_dsn, self::$db_user, self::$db_password, [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
