<?php

class Register extends Model
{
    protected $register_id;
    protected $department_name;
    protected $curriculum_name;
    protected $sem_name;
    protected $student_year;
    protected $curriculum_id;

    public function __construct($register_id = null, $department_name, $curriculum_name, $sem_name, $student_year, $curriculum_id)
    {
        $this->register_id = $register_id;
        $this->department_name = $department_name;
        $this->curriculum_name = $curriculum_name;
        $this->sem_name = $sem_name;
        $this->student_year = $student_year;
        $this->curriculum_id = $curriculum_id;
    }

    // Getters
    public function getRegister_Id()
    {
        return $this->register_id;
    }

    public function getDepartment_Name()
    {
        return $this->department_name;
    }

    public function getCurriculum_Name()
    {
        return $this->curriculum_name;
    }

    public function getSem_Name()
    {
        return $this->sem_name;
    }

    public function getStudent_Year()
    {
        return $this->student_year;
    }

    public function getCurriculum_Id()
    {
        return $this->curriculum_id;
    }

    // Setters
    public function setRegister_Id($value)
    {
        $this->register_id = $value;
    }

    public function setDepartment_Name($value)
    {
        $this->department_name = $value;
    }

    public function setCurriculum_Name($value)
    {
        $this->curriculum_name = $value;
    }

    public function setSem_Name($value)
    {
        $this->sem_name = $value;
    }

    public function setStudent_Year($value)
    {
        $this->student_year = $value;
    }

    public function setCurriculum_Id($value)
    {
        $this->curriculum_id = $value;
    }

    // Retrieve all records from the registered_tbl
    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('registered_tbl'); // Now using registered_tbl as the table name

        if ($results) {
            foreach ($results as $row) {
                $data = new Register($row['register_id'], $row['department_name'], $row['curriculum_name'], $row['sem_name'], $row['student_year'], $row['curriculum_id']);
                $list[] = $data;
            }
        }

        return $list;
    }

    // Retrieve a record by register_id
    public static function getById($register_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('registered_tbl', 'register_id', $register_id);

        if ($result) {
            $data = new Register($result['register_id'], $result['department_name'], $result['curriculum_name'], $result['sem_name'], $result['student_year'], $result['curriculum_id']);
        }

        return $data;
    }

    // Save or update a record
    public function save()
    {
        $m = Model::getInstance();
        if ($this->register_id) {
            // Update existing record
            $query = 'UPDATE registered_tbl SET department_name = :department_name, curriculum_name = :curriculum_name, sem_name = :sem_name, student_year = :student_year, curriculum_id = :curriculum_id WHERE register_id = :register_id';
            $params = [
                ':register_id' => $this->register_id,
                ':department_name' => $this->department_name,
                ':curriculum_name' => $this->curriculum_name,
                ':sem_name' => $this->sem_name,
                ':student_year' => $this->student_year,
                ':curriculum_id' => $this->curriculum_id,
            ];
        } else {
            // Insert new record
            $query = 'INSERT INTO registered_tbl (department_name, curriculum_name, sem_name, student_year, curriculum_id) VALUES (:department_name, :curriculum_name, :sem_name, :student_year, :curriculum_id)';
            $params = [
                ':department_name' => $this->department_name,
                ':curriculum_name' => $this->curriculum_name,
                ':sem_name' => $this->sem_name,
                ':student_year' => $this->student_year,
                ':curriculum_id' => $this->curriculum_id,
            ];
        }

        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    // Delete a record by register_id
    public function remove()
    {
        $m = Model::getInstance();

        if ($this->register_id) {
            $stmt = $m->delete('registered_tbl', $this->register_id);
            return $stmt->stmt->rowCount();
        }

        return 0; // No action taken if register_id is not set
    }
}
