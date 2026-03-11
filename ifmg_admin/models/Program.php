<?php
/**
 * Program Model
 * Manages Workstreams, Program Features, and List Items
 */

class Program extends Model
{
    protected $table = 'programs';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY sort_order ASC")->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $program = $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch_assoc();
        if ($program) {
            $program['features'] = $this->query("SELECT * FROM program_features WHERE program_id = ? ORDER BY sort_order ASC", [$id])->fetch_all(MYSQLI_ASSOC);
            $program['list_items'] = $this->query("SELECT * FROM program_list_items WHERE program_id = ? ORDER BY sort_order ASC", [$id])->fetch_all(MYSQLI_ASSOC);
        }
        return $program;
    }

    public function create($data)
    {
        $this->db->begin_transaction();
        try {
            $sql = "INSERT INTO {$this->table} (slug, title_en, title_so, short_desc_en, short_desc_so, full_content_en, full_content_so, icon_svg, sort_order) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->query($sql, [
                $data['slug'],
                $data['title_en'],
                $data['title_so'],
                $data['short_desc_en'],
                $data['short_desc_so'],
                $data['full_content_en'],
                $data['full_content_so'],
                $data['icon_svg'],
                $data['sort_order'] ?? 0
            ]);

            $programId = $this->db->insert_id;

            // Features (simple handle - normally would be dynamic)
            // ... logic for features and list items ...

            $this->db->commit();
            return $programId;
        } catch (Exception $e) {
            $this->db->rollback();
            return false;
        }
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET 
                slug = ?, title_en = ?, title_so = ?, 
                short_desc_en = ?, short_desc_so = ?, 
                full_content_en = ?, full_content_so = ?, 
                icon_svg = ?, sort_order = ? 
                WHERE id = ?";
        return $this->query($sql, [
            $data['slug'],
            $data['title_en'],
            $data['title_so'],
            $data['short_desc_en'],
            $data['short_desc_so'],
            $data['full_content_en'],
            $data['full_content_so'],
            $data['icon_svg'],
            $data['sort_order'],
            $id
        ]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    // Helper for clearing and re-adding features/items
    public function syncFeatures($id, $features)
    {
        $this->query("DELETE FROM program_features WHERE program_id = ?", [$id]);
        foreach ($features as $f) {
            $this->query("INSERT INTO program_features (program_id, title_en, title_so, description_en, description_so, icon_svg, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?)", [
                $id,
                $f['title_en'],
                $f['title_so'],
                $f['description_en'],
                $f['description_so'],
                $f['icon_svg'],
                $f['sort_order'] ?? 0
            ]);
        }
    }

    public function syncListItems($id, $items)
    {
        $this->query("DELETE FROM program_list_items WHERE program_id = ?", [$id]);
        foreach ($items as $item) {
            $this->query("INSERT INTO program_list_items (program_id, text_en, text_so, sort_order) VALUES (?, ?, ?, ?)", [
                $id,
                $item['text_en'],
                $item['text_so'],
                $item['sort_order'] ?? 0
            ]);
        }
    }
}
