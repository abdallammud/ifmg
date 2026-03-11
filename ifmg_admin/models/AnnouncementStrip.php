<?php
/**
 * AnnouncementStrip Model
 */

class AnnouncementStrip extends Model
{
    protected $table = 'announcement_strip';

    public function get()
    {
        $result = $this->query("SELECT * FROM {$this->table} WHERE id = 1 LIMIT 1")->fetch_assoc();
        return $result ?: [
            'id' => 1,
            'text_en' => '',
            'text_so' => '',
            'btn_text_en' => '',
            'btn_text_so' => '',
            'link' => '',
            'is_active' => 0
        ];
    }

    public function update($data)
    {
        $exists = $this->query("SELECT id FROM {$this->table} WHERE id = 1")->fetch_assoc();
        if ($exists) {
            $sql = "UPDATE {$this->table} SET 
                    text_en = ?, text_so = ?, 
                    btn_text_en = ?, btn_text_so = ?, 
                    link = ?, 
                    is_active = ? 
                    WHERE id = 1";
        } else {
            $sql = "INSERT INTO {$this->table} (text_en, text_so, btn_text_en, btn_text_so, link, is_active, id) 
                    VALUES (?, ?, ?, ?, ?, ?, 1)";
        }
        return $this->query($sql, [
            $data['text_en'],
            $data['text_so'],
            $data['btn_text_en'],
            $data['btn_text_so'],
            $data['link'],
            $data['is_active']
        ]);
    }
}
