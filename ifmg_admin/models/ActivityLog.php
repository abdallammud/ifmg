<?php
/**
 * ActivityLog Model
 */

class ActivityLog extends Model
{
    protected $table = 'activity_log';

    public function getAll($limit = 100)
    {
        return $this->query("
            SELECT l.*, u.username as user_name 
            FROM {$this->table} l 
            LEFT JOIN users u ON l.user_id = u.id 
            ORDER BY l.created_at DESC 
            LIMIT ?
        ", [$limit])->fetch_all(MYSQLI_ASSOC);
    }

    public static function log($action, $entity_type = null, $entity_id = null, $description = null)
    {
        $db = (new Model())->query(""); // Dummy to get DB instance if needed, or just use static method
        // Better implementation:
        $instance = new self();
        $user_id = Session::get('user_id');
        $ip = $_SERVER['REMOTE_ADDR'];

        $sql = "INSERT INTO activity_log (user_id, action, entity_type, entity_id, description, ip_address) VALUES (?, ?, ?, ?, ?, ?)";
        return $instance->query($sql, [$user_id, $action, $entity_type, $entity_id, $description, $ip]);
    }
}
