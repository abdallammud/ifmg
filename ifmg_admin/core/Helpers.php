<?php
/**
 * Global Helpers Class
 */

class Helpers
{
    public static function url($path = "")
    {
        return BASE_URL . ltrim($path, '/');
    }

    public static function asset($path)
    {
        return BASE_URL . 'assets/' . ltrim($path, '/');
    }

    public static function e($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    public static function logActivity($action, $entityType = null, $entityId = null, $description = null)
    {
        $db = $GLOBALS['db'];
        $userId = Auth::user()['id'] ?? null;
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';

        $stmt = $db->prepare("INSERT INTO activity_log (user_id, action, entity_type, entity_id, description, ip_address) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $userId, $action, $entityType, $entityId, $description, $ip);
        $stmt->execute();
    }

    public static function uploadFile($file, $folder = 'general')
    {
        $targetDir = UPLOAD_PATH . $folder . '/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $filename = time() . '_' . str_replace(' ', '_', basename($file['name']));
        $targetFile = $targetDir . $filename;
        $dbPath = $folder . '/' . $filename;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return $dbPath;
        }

        return null;
    }
}

// Global function wrappers for convenience
function url($path = "")
{
    return Helpers::url($path);
}
function asset($path)
{
    return Helpers::asset($path);
}
function e($string)
{
    return Helpers::e($string);
}

function logActivity($action, $entityType = null, $entityId = null, $description = null)
{
    return Helpers::logActivity($action, $entityType, $entityId, $description);
}
