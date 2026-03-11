<?php
/**
 * Publication Model
 * Manages policy papers, reports, etc.
 */

class Publication extends Model
{
    protected $table = 'publications';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY published_date DESC, sort_order ASC")->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch_assoc();
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (title_en, title_so, description_en, description_so, category, cover_image, pdf_file, published_date, is_featured, sort_order) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['description_en'],
            $data['description_so'],
            $data['category'],
            $data['cover_image'],
            $data['pdf_file'],
            $data['published_date'],
            $data['is_featured'] ?? 0,
            $data['sort_order'] ?? 0
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET 
                title_en = ?, title_so = ?, 
                description_en = ?, description_so = ?, 
                category = ?, cover_image = ?, 
                pdf_file = ?, published_date = ?, 
                is_featured = ?, sort_order = ? 
                WHERE id = ?";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['description_en'],
            $data['description_so'],
            $data['category'],
            $data['cover_image'],
            $data['pdf_file'],
            $data['published_date'],
            $data['is_featured'],
            $data['sort_order'],
            $id
        ]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
