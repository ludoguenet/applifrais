<?php

namespace App\Controllers\Auth;

use App\View;

class AuthController
{
    public function login(): View
    {
        return View::make('auth/login');
    }
}