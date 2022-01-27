<?php

namespace App\Controllers;

abstract class Controller
{
    /**
     * Redirection vers un chemin.
     *
     * @param [type] $path
     * @return void
     */
    protected function redirect($path): void
    {
        header('Location: ' . $path);
    }
}