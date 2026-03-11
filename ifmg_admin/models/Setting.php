<?php
/**
 * Setting Model
 */

class Setting extends Model
{
    protected $table = 'settings';

    public function getAll()
    {
        $rows = $this->query("SELECT * FROM {$this->table}")->fetch_all(MYSQLI_ASSOC);
        $settings = [];
        foreach ($rows as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
        return $settings;
    }

    public function updateKey($key, $value)
    {
        return $this->query("UPDATE {$this->table} SET setting_value = ? WHERE setting_key = ?", [$value, $key]);
    }
}
