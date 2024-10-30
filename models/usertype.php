<?php

class UserType extends Model
{
    protected $type_id;
    protected $type;

    public function __construct($type_id = null, $type)
    {
        $this->type_id = $type_id;
        $this->type = $type;
    }

    public function getType_Id()
    {
        return $this->type_id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType_Id($value)
    {
        $this->type_id = $value;
    }

    public function setType($value)
    {
        $this->type = $value;
    }

    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('user_type_tbl'); // Using the provided table name 'user_type_tbl'
        
        if ($results) {
            foreach ($results as $row) {
                $data = new UserType($row['type_id'], $row['type']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($type_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('user_type_tbl', 'type_id', $type_id);
        
        if ($result) {
            $data = new UserType($result['type_id'], $result['type']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->type_id) {
            // Update existing user type
            $query = 'UPDATE user_type_tbl SET type = :type WHERE type_id = :type_id';
            $params = [
                ':type_id' => $this->type_id,
                ':type' => $this->type,
            ];
        } else {
            // Insert new user type
            $query = 'INSERT INTO user_type_tbl (type) VALUES (:type)';
            $params = [
                ':type' => $this->type,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->type_id) {
            $stmt = $m->delete('user_type_tbl', $this->type_id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}
