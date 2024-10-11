<?php

namespace App\Router;


class ActionNotFoundException extends \Exception
{
    public function __construct($message = "Action was not found")
    {
        parent::__construct($message, 1);
    }
}
