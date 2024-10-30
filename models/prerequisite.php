<?php

class Course extends Model
{
    protected $pre_requisite_id;
    protected $sub_name;
    protected $sub_title;
    protected $sub_pre_requisite;

    public function __construct($pre_requisite_id = null, $sub_name, $sub_title, $sub_pre_requisite)
    {
        $this->pre_requisite_id = $pre_requisite_id;
        $this->sub_name = $sub_name;
        $this->sub_title = $sub_title;
        $this->sub_pre_requisite = $sub_pre_requisite;
    }

    // Getters
    public function getPre_Requisite_Id()
    {
        return $this->pre_requisite_id;
    }

    public function getSub_Name()
    {
        return $this->sub_name;
    }

    public function getSub_Title()
    {
        return $this->sub_title;
    }

    public function getSub_Pre_Requisite()
    {
        return $this->sub_pre_requisite;
    }

    // Setters
    public function setPre_Requisite_Id($value)
    {
        $this->pre_requisite_id = $value;
    }

    public function setSub_Name($value)
    {
        $this->sub_name = $value;
    }

    public function setSub_Title($value)
    {
        $this->sub_title = $value;
    }

    public function setSub_Pre_Requisite($value)
    {
        $this->sub_pre_requisite = $value;
    }

    // Retrieve all records from the database
    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('prerequisite_tbl');

        if ($results) {
            foreach ($results as $row) {
                $data = new Course($row['pre_requisite_id'], $row['sub_name'], $row['sub_title'], $row['sub_pre_requisite']);
                $list[] = $data;
            }
        }

        return $list;
    }

    // Retrieve a record by pre_requisite_id
    public static function getById($pre_requisite_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('prerequisite_tbl', 'pre_requisite_id', $pre_requisite_id);

        if ($result) {
            $data = new Course($result['pre_requisite_id'], $result['sub_name'], $result['sub_title'], $result['sub_pre_requisite']);
        }

        return $data;
    }

    // Save or update a record
    public function save()
    {
        $m = Model::getInstance();
        if ($this->pre_requisite_id) {
            // Update existing record
            $query = 'UPDATE prerequisite_tbl SET sub_name = :sub_name, sub_title = :sub_title, sub_pre_requisite = :sub_pre_requisite WHERE pre_requisite_id = :pre_requisite_id';
            $params = [
                ':pre_requisite_id' => $this->pre_requisite_id,
                ':sub_name' => $this->sub_name,
                ':sub_title' => $this->sub_title,
                ':sub_pre_requisite' => $this->sub_pre_requisite,
            ];
        } else {
            // Insert new record
            $query = 'INSERT INTO prerequisite_tbl (sub_name, sub_title, sub_pre_requisite) VALUES (:sub_name, :sub_title, :sub_pre_requisite)';
            $params = [
                ':sub_name' => $this->sub_name,
                ':sub_title' => $this->sub_title,
                ':sub_pre_requisite' => $this->sub_pre_requisite,
            ];
        }

        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    // Delete a record by pre_requisite_id
    public function remove()
    {
        $m = Model::getInstance();

        if ($this->pre_requisite_id) {
            $stmt = $m->delete('prerequisite_tbl', $this->pre_requisite_id);
            return $stmt->stmt->rowCount();
        }

        return 0; // No action taken if pre_requisite_id is not set
    }
}
