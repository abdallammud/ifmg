<?php
/**
 * MediaModel for asset management
 */

class Media extends Model
{
    protected $table = 'media_library';

    public function getAll($type = null)
    {
        $sql = "SELECT * FROM {$this->table}";
        $params = [];
        if ($type) {
            if ($type == 'image') {
                $sql .= " WHERE mime_type LIKE 'image/%'";
            } else {
                $sql .= " WHERE mime_type NOT LIKE 'image/%'";
            }
        }
        $sql .= " ORDER BY created_at DESC";
        return $this->query($sql, $params)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch_assoc();
    }

    public function create($filename, $original_name, $mime_type, $size, $path, $user_id)
    {
        $sql = "INSERT INTO {$this->table} (filename, original_name, mime_type, file_size, file_path, uploaded_by) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [$filename, $original_name, $mime_type, $size, $path, $user_id]);
    }

    public function delete($id)
    {
        $asset = $this->getById($id);
        if ($asset) {
            $path = UPLOAD_PATH . '/' . $asset['filename'];
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
