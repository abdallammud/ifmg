<?php
/**
 * DirectorMessage Model
 */

class DirectorMessage extends Model
{
    protected $table = 'director_message';

    public function get()
    {
        $result = $this->query("SELECT * FROM {$this->table} WHERE id = 1 LIMIT 1")->fetch_assoc();
        return $result ?: [
            'id' => 1,
            'name_en' => '',
            'name_so' => '',
            'title_en' => '',
            'title_so' => '',
            'quote_en' => '',
            'quote_so' => '',
            'message_en' => '',
            'message_so' => '',
            'photo' => ''
        ];
    }

    public function update($data)
    {
        $exists = $this->query("SELECT id FROM {$this->table} WHERE id = 1")->fetch_assoc();
        if ($exists) {
            $sql = "UPDATE {$this->table} SET 
                    name_en = ?, name_so = ?, 
                    title_en = ?, title_so = ?, 
                    quote_en = ?, quote_so = ?, 
                    message_en = ?, message_so = ?, 
                    photo = ? 
                    WHERE id = 1";
        } else {
            $sql = "INSERT INTO {$this->table} (name_en, name_so, title_en, title_so, quote_en, quote_so, message_en, message_so, photo, id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
        }
        return $this->query($sql, [
            $data['name_en'],
            $data['name_so'],
            $data['title_en'],
            $data['title_so'],
            $data['quote_en'],
            $data['quote_so'],
            $data['message_en'],
            $data['message_so'],
            $data['photo']
        ]);
    }
}
