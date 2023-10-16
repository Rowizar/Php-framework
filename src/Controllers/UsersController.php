<?php

namespace src\Controllers;

use src\Models\Users\User;
use src\View\View;
class UsersController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../templates');
    }
}