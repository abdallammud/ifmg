<?php
/**
 * Base Model class (MySQLi)
 */

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = $GLOBALS['db'];
    }

    // Basic query helper
    public function query($sql, $params = [])
    {
        if (empty($params)) {
            return $this->db->query($sql);
        }

        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            die("SQL Error: " . $this->db->error);
        }

        if (!empty($params)) {
            $types = "";
            $values = [];
            foreach ($params as $param) {
                if (is_int($param))
                    $types .= "i";
                elseif (is_double($param))
                    $types .= "d";
                elseif (is_string($param))
                    $types .= "s";
                else
                    $types .= "b";
                $values[] = $param;
            }
            $stmt->bind_param($types, ...$values);
        }

        $stmt->execute();
        return $stmt->get_result();
    }

    public function fetchAll($result)
    {
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOne($result)
    {
        return $result->fetch_assoc();
    }
}
