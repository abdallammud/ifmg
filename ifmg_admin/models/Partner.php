<?php
/**
 * Partner Model
 */

class Partner extends Model
{
    protected $table = 'partners';

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY sort_order ASC, id DESC";
        return $this->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->query($sql, [$id])->fetch_assoc();
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (name, logo, website_url, sort_order) VALUES (?, ?, ?, ?)";
        return $this->query($sql, [$data['name'], $data['logo'], $data['website_url'], $data['sort_order']]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET name = ?, logo = ?, website_url = ?, sort_order = ? WHERE id = ?";
        return $this->query($sql, [$data['name'], $data['logo'], $data['website_url'], $data['sort_order'], $id]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
