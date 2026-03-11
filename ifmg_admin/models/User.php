<?php
/**
 * User Model
 */

require_once CORE_PATH . 'Model.php';

class User extends Model
{
    public function findByUsername($username)
    {
        $result = $this->query("SELECT * FROM users WHERE username = ? AND is_active = 1", [$username]);
        return $this->fetchOne($result);
    }

    public function updateLastLogin($id)
    {
        $this->query("UPDATE users SET last_login = NOW() WHERE id = ?", [$id]);
    }
}
