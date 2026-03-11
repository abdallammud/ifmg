<?php
/**
 * Middleware for route protection
 */

class Middleware
{
    public static function auth()
    {
        if (!Auth::check()) {
            header("Location: " . BASE_URL . "login");
            exit();
        }
    }

    public static function guest()
    {
        if (Auth::check()) {
            header("Location: " . BASE_URL . "dashboard");
            exit();
        }
    }

    public static function role($role)
    {
        self::auth();
        if (!Auth::role($role)) {
            die("Unauthorized access.");
        }
    }
}
