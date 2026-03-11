<?php
/**
 * Contact Model
 */

class Contact extends Model
{
    protected $table = 'contact_submissions';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC")->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch_assoc();
    }

    public function markAsRead($id)
    {
        return $this->query("UPDATE {$this->table} SET is_read = 1 WHERE id = ?", [$id]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function getUnreadCount()
    {
        $res = $this->query("SELECT COUNT(*) as count FROM {$this->table} WHERE is_read = 0")->fetch_assoc();
        return $res['count'] ?? 0;
    }
}
