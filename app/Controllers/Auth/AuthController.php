<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\View;
use Models\User;
use Helpers\Auth\Auth;

class AuthController extends Controller
{
    /**
     * Page de connexion.
     *
     * @return View
     */
    public function login(): View
    {
        return View::make('auth/login');
    }

    /**
     * Authentifie l'utilisateur connecté sinon renvoie false.
     *
     * @return mixed
     */
    public function authenticate(): mixed
    {
        $textLogin = $_POST['txtLogin'];
        $textMdp = $_POST['txtMdp'];

        $visiteur = (new User())->where(['login', 'mdp'], [$textLogin, $textMdp]);

        if (!$visiteur) return $this->redirect('login');
    
        Auth::log([$visiteur['id'], $visiteur['login']]);

        return $this->redirect('fiches-de-frais');
    }
}