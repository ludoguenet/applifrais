<?php

namespace Helpers\Auth;

class Auth
{
    /**
     * Enregistre les informations pour authentifier l'utilisateur.
     *
     * @param array $params
     * @return void
     */
    public static function log(array $params): void
    {
        foreach ($params as $key => $param) {
            $_SESSION['auth'][$key] = $param;
        }
    }

    /**
     * Vérifie si l'utilisateur est authentifié.
     *
     * @return boolean
     */
    public static function check(): bool
    {
        return isset($_SESSION['auth']);
    }
}