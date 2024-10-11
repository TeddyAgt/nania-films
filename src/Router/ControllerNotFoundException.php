<?php

namespace App\Router;

use Exception;

class ControllerNotFoundExcption extends Exception
{
    public function __construct(string $message = "Controller was not found")
    {
        parent::__construct($message, 1);
    }
}
