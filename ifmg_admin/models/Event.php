<?php
/**
 * Event Model
 * Manages Workshops, Conferences, etc.
 */

class Event extends Model
{
    protected $table = 'events';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY event_date DESC")->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch_assoc();
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (title_en, title_so, description_en, description_so, location_en, location_so, event_date, start_time, end_time, event_type) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['description_en'],
            $data['description_so'],
            $data['location_en'],
            $data['location_so'],
            $data['event_date'],
            $data['start_time'],
            $data['end_time'],
            $data['event_type']
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET 
                title_en = ?, title_so = ?, 
                description_en = ?, description_so = ?, 
                location_en = ?, location_so = ?, 
                event_date = ?, start_time = ?, 
                end_time = ?, event_type = ? 
                WHERE id = ?";
        return $this->query($sql, [
            $data['title_en'],
            $data['title_so'],
            $data['description_en'],
            $data['description_so'],
            $data['location_en'],
            $data['location_so'],
            $data['event_date'],
            $data['start_time'],
            $data['end_time'],
            $data['event_type'],
            $id
        ]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}
