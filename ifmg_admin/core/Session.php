<?php
/**
 * Session Helper
 */

class Session
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function remove($key)
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function flash($key, $message = null)
    {
        if ($message) {
            self::set("flash_$key", $message);
        } else {
            $msg = self::get("flash_$key");
            self::remove("flash_$key");
            return $msg;
        }
    }

    public static function setFlash($key, $message)
    {
        self::flash($key, $message);
    }

    public static function getFlash($key)
    {
        return self::flash($key);
    }
}
