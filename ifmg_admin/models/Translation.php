<?php
/**
 * Translation Model
 */

class Translation extends Model
{
    protected $table = 'translations';

    public function getAll()
    {
        $rows = $this->query("SELECT * FROM {$this->table} ORDER BY trans_key ASC")->fetch_all(MYSQLI_ASSOC);

        // Group by key
        $grouped = [];
        foreach ($rows as $row) {
            $key = $row['trans_key'];
            if (!isset($grouped[$key])) {
                $grouped[$key] = ['en' => '', 'so' => ''];
            }
            $grouped[$key][$row['lang']] = $row['trans_value'];
        }
        return $grouped;
    }

    public function updateKey($key, $lang, $value)
    {
        // Use REPLACE INTO or check exists
        $exists = $this->query("SELECT id FROM {$this->table} WHERE trans_key = ? AND lang = ?", [$key, $lang])->fetch_assoc();

        if ($exists) {
            return $this->query("UPDATE {$this->table} SET trans_value = ? WHERE id = ?", [$value, $exists['id']]);
        } else {
            return $this->query("INSERT INTO {$this->table} (trans_key, lang, trans_value) VALUES (?, ?, ?)", [$key, $lang, $value]);
        }
    }

    public function getForExport()
    {
        $rows = $this->query("SELECT * FROM {$this->table}")->fetch_all(MYSQLI_ASSOC);
        $data = ['en' => [], 'so' => []];
        foreach ($rows as $row) {
            $data[$row['lang']][$row['trans_key']] = $row['trans_value'];
        }
        return $data;
    }
}
