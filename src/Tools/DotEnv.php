<?php

namespace App\Tools;

class DotEnv
{
    public function load($file): void
    {
        $lines = file($file);
        foreach ($lines as $line) {
            [$key, $value] = explode("=", $line);
            $key = trim($key);
            $value = trim($value);

            putenv(sprintf("%s=%s", $key, $value));
            $_ENV[$key] = $value;
        }
    }

    public function getCredentials(): array
    {
        $lines = file(".env.dev");
        $credentials = [];

        foreach ($lines as $line) {
            [$key, $value] = explode("=", $line);
            $key = trim($key);
            $value = trim($value);
            $credentials[$key] = $value;
        }

        return $credentials;
    }
}
