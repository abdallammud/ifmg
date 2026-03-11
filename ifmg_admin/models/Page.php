<?php
/**
 * Page Model
 * Manages static content pages (history, vision, mission, etc.)
 */

class Page extends Model
{
    protected $table = 'pages';

    public function getBySlug($slug)
    {
        $sql = "SELECT * FROM {$this->table} WHERE slug = ? LIMIT 1";
        $result = $this->query($sql, [$slug])->fetch_assoc();
        return $result ?: [
            'slug' => $slug,
            'title_en' => '',
            'title_so' => '',
            'content_en' => '',
            'content_so' => '',
            'meta_title' => '',
            'meta_desc' => ''
        ];
    }

    public function update($slug, $data)
    {
        $exists = $this->query("SELECT id FROM {$this->table} WHERE slug = ?", [$slug])->fetch_assoc();
        if ($exists) {
            $sql = "UPDATE {$this->table} SET 
                    title_en = ?, title_so = ?, 
                    content_en = ?, content_so = ?, 
                    meta_title = ?, meta_desc = ?, 
                    updated_at = NOW() 
                    WHERE slug = ?";
            return $this->query($sql, [
                $data['title_en'],
                $data['title_so'],
                $data['content_en'],
                $data['content_so'],
                $data['meta_title'] ?? null,
                $data['meta_desc'] ?? null,
                $slug
            ]);
        } else {
            $sql = "INSERT INTO {$this->table} (slug, title_en, title_so, content_en, content_so, meta_title, meta_desc, created_at, updated_at) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
            return $this->query($sql, [
                $slug,
                $data['title_en'],
                $data['title_so'],
                $data['content_en'],
                $data['content_so'],
                $data['meta_title'] ?? null,
                $data['meta_desc'] ?? null
            ]);
        }
    }
}
