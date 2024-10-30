<?php

class Course extends Model
{
    protected $id;
    protected $department;
    protected $description;

    public function __construct($id = null, $department, $description)
    {
        $this->id = $id;
        $this->department = $department;
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setDepartment($value)
    {
        $this->department = $value;
    }

    public function setDescription ($value)
    {
        $this->description = $value;
    }

    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('department_tbl');
        
        if ($results) {
            foreach ($results as $row) {
                $data = new department_tbl($row['id'], $row['department'], $row['description']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('department_tbl', 'id', $id);
        
        if ($result) {
            $data = new Course($result['id'], $result['department'], $result['description']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->id) {
            // Update existing course
            $query = 'UPDATE department_tbl SET department = :department, description = :description, WHERE id = :id';
            $params = [
                ':id' => $this->id,
                ':department' => $this->department,
                ':description' => $this->description,
            ];
        } else {
            // Insert new course (let the DB auto-generate the id if it's null)
            $query = 'INSERT INTO department_tbl (department, description) VALUES (:id, :department, :description)';
            $params = [
                ':id' => $this->id,
                ':department' => $this->department,
                ':description' => $this->description,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->id) {
            $stmt = $m->delete('department_tbl', $this->id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}  