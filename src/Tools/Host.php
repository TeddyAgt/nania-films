<?php

namespace App\Tools;

class Host extends \PDO
{
    private static $instance;
    private static string $host;
    private static string $dbName;
    private static $username;
    private static $password;

    private function __construct()
    {
        $credentials = (new DotEnv())->getCredentials();
        self::$host = $credentials["DB_HOST"];
        self::$dbName = $credentials["DB_NAME"];
        self::$username = $credentials["DB_USER"];
        self::$password = $credentials["DB_PASSWORD"];
        $_dsn = "mysql:dbname=" . self::$dbName . ";host=" . self::$host;

        try {
            parent::__construct($_dsn, self::$username, self::$password, [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]);

            $this->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
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
