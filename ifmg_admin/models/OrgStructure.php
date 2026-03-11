<?php
/**
 * OrgStructure Model
 * Manages the organizational structure members (Board, Director, Department)
 */

class OrgStructure extends Model
{
    protected $table = 'org_structure';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY level, sort_order ASC")->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch_assoc();
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (title_en, title_so, level, icon_svg, icon_color, bg_color, text_color, sort_order) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['level'],
            $data['icon_svg'],
            $data['icon_color'] ?? null,
            $data['bg_color'] ?? null,
            $data['text_color'] ?? 'white',
            $data['sort_order'] ?? 0
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET 
                title_en = ?, title_so = ?, 
                level = ?, icon_svg = ?, 
                icon_color = ?, bg_color = ?, 
                text_color = ?, sort_order = ? 
                WHERE id = ?";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['level'],
            $data['icon_svg'],
            $data['icon_color'],
            $data['bg_color'],
            $data['text_color'],
            $data['sort_order'],
            $id
        ]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
