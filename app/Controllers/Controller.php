<?php

namespace App\Controllers;

abstract class Controller
{
    protected function redirect($path)
    {
        header('Location: ' . $path);
    }
}