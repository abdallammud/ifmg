<?php
/**
 * CoreValue Model
 */

class CoreValue extends Model
{
    protected $table = 'core_values';

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY sort_order ASC, id ASC";
        return $this->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->query($sql, [$id])->fetch_assoc();
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (title_en, title_so, description_en, description_so, sort_order) VALUES (?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'] ?? null,
            $data['description_en'] ?? null,
            $data['description_so'] ?? null,
            $data['sort_order'] ?? 0
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET title_en = ?, title_so = ?, description_en = ?, description_so = ?, sort_order = ? WHERE id = ?";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'] ?? null,
            $data['description_en'] ?? null,
            $data['description_so'] ?? null,
            $data['sort_order'] ?? 0,
            $id
        ]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
