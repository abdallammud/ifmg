<?php
/**
 * Announcement Model
 */

class Announcement extends Model
{
    protected $table = 'announcements';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY sort_order ASC, published_date DESC")->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch_assoc();
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (title_en, title_so, description_en, description_so, published_date, status, action_label_en, action_label_so, action_link, attachment, border_color, sort_order) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['description_en'],
            $data['description_so'],
            $data['published_date'],
            $data['status'] ?? 'open',
            $data['action_label_en'],
            $data['action_label_so'],
            $data['action_link'],
            $data['attachment'],
            $data['border_color'] ?? 'gold-500',
            $data['sort_order'] ?? 0
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET 
                title_en = ?, title_so = ?, 
                description_en = ?, description_so = ?, 
                published_date = ?, status = ?, 
                action_label_en = ?, action_label_so = ?, 
                action_link = ?, attachment = ?, 
                border_color = ?, sort_order = ? 
                WHERE id = ?";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['description_en'],
            $data['description_so'],
            $data['published_date'],
            $data['status'],
            $data['action_label_en'],
            $data['action_label_so'],
            $data['action_link'],
            $data['attachment'],
            $data['border_color'],
            $data['sort_order'],
            $id
        ]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
