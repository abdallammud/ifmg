<?php
/**
 * MediaArticle Model
 */

class MediaArticle extends Model
{
    protected $table = 'media_articles';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY published_date DESC")->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch_assoc();
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (title_en, title_so, excerpt_en, excerpt_so, content_en, content_so, cover_image, published_date, is_featured, is_active) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['excerpt_en'],
            $data['excerpt_so'],
            $data['content_en'],
            $data['content_so'],
            $data['cover_image'],
            $data['published_date'],
            $data['is_featured'] ?? 0,
            $data['is_active'] ?? 1
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET 
                title_en = ?, title_so = ?, 
                excerpt_en = ?, excerpt_so = ?, 
                content_en = ?, content_so = ?, 
                cover_image = ?, published_date = ?, 
                is_featured = ?, is_active = ? 
                WHERE id = ?";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['excerpt_en'],
            $data['excerpt_so'],
            $data['content_en'],
            $data['content_so'],
            $data['cover_image'],
            $data['published_date'],
            $data['is_featured'],
            $data['is_active'],
            $id
        ]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
