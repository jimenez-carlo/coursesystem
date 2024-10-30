<?php

class Course extends Model
{
    protected $evaluated_id;
    protected $department_name;
    protected $year_level;
    protected $student_no;
    protected $student_name;

    public function __construct($evaluated_id = null, $department_name, $year_level, $student_no, $student_name)
    {
        $this->evaluated_id = $evaluated_id;
        $this->department_name = $department_name;
        $this->year_level = $year_level;
        $this->student_no = $student_no;
        $this->student_name = $student_name;
    }

    public function getEvaluated_Id()
    {
        return $this->evaluated_id;
    }

    public function getDepartment_Name()
    {
        return $this->department_name;
    }

    public function getYear_Level()
    {
        return $this->year_level;
    }
    public function getStudent_No()
    {
        return $this->student_no;
    }

    public function getStudent_Name()
    {
        return $this->student_name;
    }

    public function setEvaluated_Id($value)
    {
        $this->evaluated_id = $value;
    }

    public function setDepartment_Name($value)
    {
        $this->department_name = $value;
    }

    public function setYear_Level($value)
    {
        $this->year_level = $value;
    }
    public function setStudent_No($value)
    {
        $this->student_no = $value;
    }

    public function setStudent_Name($value)
    {
        $this->student_name = $value;
    }

    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('evaluated_tbl');
        
        if ($results) {
            foreach ($results as $row) {
                $data = new evaluated_tbl($row['evaluated_id'], $row['department_name'], $row['year_level'], $row['student_no'], $row['student_name']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($evaluated_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('evaluated_tbl', 'evaluated_id', $evaluated_id);
        
        if ($result) {
            $data = new Course($result['evaluated_id'], $result['department_name'], $result['year_level'], $result['student_no'], $result['student_name']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->id) {
            // Update existing course
            $query = 'UPDATE evaluated_tbl SET department_name = :department_name, year_level= :year_level, student_no = :student_no, student_name= :student_name WHERE evaluated_id = :evaluated_id';
            $params = [
                ':evaluated_id' => $this->evaluated_id,
                ':department_name' => $this->department_name,
                ':year_level' => $this->year_level,
                ':student_no' => $this->student_no,
                ':student_name' => $this->student_name,
            ];
        } else {
            // Insert new course (let the DB auto-generate the id if it's null)
            $query = 'INSERT INTO evaluated_tbl (department_name, year_level, student_no, student_name) VALUES (department_name = :department_name, year_level= :year_level, student_no = :student_no, student_name= :student_name)';
            $params = [
          ':evaluated_id' => $this->evaluated_id,
                ':department_name' => $this->department_name,
                ':year_level' => $this->year_level,
                ':student_no' => $this->student_no,
                ':student_name' => $this->student_name,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->id) {
            $stmt = $m->delete('evaluated_tbl', $this->id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}  