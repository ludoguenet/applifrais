<?php

namespace App\Controllers;

use App\View;

class HomeController
{
    public function index(): string
    {
        return (new View('index'))->render();
    }
}