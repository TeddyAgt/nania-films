<?php

namespace App\Router;

use App\Controllers\Home;

class Router
{
    private static $instance;

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function start()
    {
        $uriParams = $this->parseURI();
        if (($controller = ucfirst(array_shift($uriParams)))) {
            $controller = "\\App\\Controllers\\$controller";
            if (class_exists($controller)) {
                $controller = new $controller();
                $action = (isset($uriParams["action"])) ? array_shift($uriParams) : "index";
                if (method_exists($controller, $action)) {
                    $controller->$action(...$uriParams);
                } else {
                    http_response_code(404);
                    throw new ActionNotFoundException();
                }
            } else {
                http_response_code(404);
                throw new ControllerNotFoundExcption();
            }
        } else {
            (new Home())->index();
        }
    }

    private function parseURI(): array
    {
        $uriArray = explode("=", $_SERVER["QUERY_STRING"]);

        $uriParams = [];
        foreach ($uriArray as $queryString) {
            $uriParams[explode("=", $queryString)[0]] = explode("=", $queryString)[1];
        }
        return $uriParams;
    }
}
