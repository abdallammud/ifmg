<?php
/**
 * HeroSlide Model
 */

class HeroSlide extends Model
{
    protected $table = 'hero_slides';

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
        $sql = "INSERT INTO {$this->table} (title_en, title_so, subtitle_en, subtitle_so, bg_image, cta_text_en, cta_text_so, cta_link, sort_order) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['subtitle_en'],
            $data['subtitle_so'],
            $data['bg_image'],
            $data['cta_text_en'],
            $data['cta_text_so'],
            $data['cta_link'],
            $data['sort_order'] ?? 0
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET 
                title_en = ?, title_so = ?, 
                subtitle_en = ?, subtitle_so = ?, 
                bg_image = ?, 
                cta_text_en = ?, cta_text_so = ?, 
                cta_link = ?, 
                sort_order = ? 
                WHERE id = ?";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['subtitle_en'],
            $data['subtitle_so'],
            $data['bg_image'],
            $data['cta_text_en'],
            $data['cta_text_so'],
            $data['cta_link'],
            $data['sort_order'],
            $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->query($sql, [$id]);
    }
}
