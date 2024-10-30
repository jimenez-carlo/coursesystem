<?php

class Course extends Model
{
    protected $range_id;
    protected $grade;
    protected $description;

    public function __construct($range_id = null, $grade, $description)
    {
        $this->range_id = $range_id;
        $this->grade = $grade;
        $this->description = $description;
    }

    public function getRange_Id()
    {
        return $this->id;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setRangeId($value)
    {
        $this->range_id = $value;
    }

    public function setGrade($value)
    {
        $this->grade = $value;
    }

    public function setDescription ($value)
    {
        $this->description = $value;
    }

    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('grade_range_tbl');
        
        if ($results) {
            foreach ($results as $row) {
                $data = new grade_range_tbl($row['range_id'], $row['grade'], $row['description']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('grade_range_tbl', 'range_id', $range_id);
        
        if ($result) {
            $data = new Course($result['range_id'], $result['grade'], $result['description']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->id) {
            // Update existing course
            $query = 'UPDATE grade_range_tbl SET grade = :grade, description = :description, WHERE range_id = :range_id';
            $params = [
                ':range_id' => $this->range_id,
                ':grade' => $this->grade,
                ':description' => $this->description,
            ];
        } else {
            // Insert new course (let the DB auto-generate the id if it's null)
            $query = 'INSERT INTO grade_range_tbl (grade, description) VALUES (:range_id, :grade, :description)';
            $params = [
                ':range_id' => $this->range_id,
                ':grade' => $this->grade,
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
            $stmt = $m->delete('grade_range_tbl', $this->range_id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}  