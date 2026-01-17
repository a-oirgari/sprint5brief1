<?php

class AuthMiddleware
{
    public static function handle()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            setFlash('error', "Vous devez être connecté pour accéder à cette page.");
            header('Location: /login');
            exit;
        }
    }

    public static function checkRole($allowedRoles)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            self::forbidden();
            return;
        }

        $user = User::findById($_SESSION['user_id']);

        if (!$user) {
            self::forbidden();
            return;
        }

        $role = $user->getRole();

        if (!$role || !in_array($role->getName(), $allowedRoles)) {
            self::forbidden();
            return;
        }
    }

    private static function forbidden()
    {
        http_response_code(403);
        View::render('errors/403');
        exit;
    }

    public static function guest()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user_id'])) {
            $user = User::findById($_SESSION['user_id']);
            if ($user) {
                $role = $user->getRole();
                if ($role) {
                    header('Location: /' . $role->getName() . '/dashboard');
                    exit;
                }
            }
        }
    }
}