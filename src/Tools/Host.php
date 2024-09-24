<?php

namespace App\Tools;

class Host extends \PDO
{
    private static $instance;
    private static string $db_host;
    private static string $db_name;
    private static string $db_user;
    private static string $db_password;

    private function __construct()
    {
        self::$db_host = getenv("DB_HOST");
        self::$db_name = getenv("DB_NAME");
        self::$db_user = getenv("DB_USER");
        self::$db_password = getenv("DB_PASSWORD");

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
