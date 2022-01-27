<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\View;
use Models\User;
use Helpers\Auth;

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
     * Tente d'authentifier l'utilisateur.
     *
     * @return void
     */
    public function authenticate(): void
    {
        $textLogin = $_POST['login'];
        $textMdp = $_POST['password'];

        $visiteur = (new User())->where(['login', 'mdp'], [$textLogin, $textMdp]);

        if (!$visiteur) {
            $this->redirect('login');
        } else {
            Auth::log([$visiteur['id'], $visiteur['login']]);
            $this->redirect('/fiches-de-frais');
        }
    
    }

    /**
     * Déconnecte l'utilisateur authentifié.
     *
     * @return void
     */
    public function logout(): void
    {
        if (Auth::check()) {
            unset($_SESSION['auth']);
        }

        $this->redirect('/');
    }
}