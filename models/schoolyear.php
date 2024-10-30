<?php

class SchoolYear extends Model
{
    protected $year_id;
    protected $dept_name;
    protected $curriculum_name;
    protected $school_year;

    public function __construct($year_id = null, $dept_name, $curriculum_name, $school_year)
    {
        $this->year_id = $year_id;
        $this->dept_name = $dept_name;
        $this->curriculum_name = $curriculum_name;
        $this->school_year = $school_year;
    }

    // Getters
    public function getYear_Id()
    {
        return $this->year_id;
    }

    public function getDept_Name()
    {
        return $this->dept_name;
    }

    public function getCurriculum_Name()
    {
        return $this->curriculum_name;
    }

    public function getSchool_Year()
    {
        return $this->school_year;
    }

    // Setters
    public function setYear_Id($value)
    {
        $this->year_id = $value;
    }

    public function setDept_Name($value)
    {
        $this->dept_name = $value;
    }

    public function setCurriculum_Name($value)
    {
        $this->curriculum_name = $value;
    }

    public function setSchool_Year($value)
    {
        $this->school_year = $value;
    }

    // Retrieve all records from school_year_tbl
    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('school_year_tbl'); // Now using school_year_tbl as the table name

        if ($results) {
            foreach ($results as $row) {
                $data = new SchoolYear($row['year_id'], $row['dept_name'], $row['curriculum_name'], $row['school_year']);
                $list[] = $data;
            }
        }

        return $list;
    }

    // Retrieve a record by year_id
    public static function getById($year_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('school_year_tbl', 'year_id', $year_id);

        if ($result) {
            $data = new SchoolYear($result['year_id'], $result['dept_name'], $result['curriculum_name'], $result['school_year']);
        }

        return $data;
    }

    // Save or update a record
    public function save()
    {
        $m = Model::getInstance();
        if ($this->year_id) {
            // Update existing record
            $query = 'UPDATE school_year_tbl SET dept_name = :dept_name, curriculum_name = :curriculum_name, school_year = :school_year WHERE year_id = :year_id';
            $params = [
                ':year_id' => $this->year_id,
                ':dept_name' => $this->dept_name,
                ':curriculum_name' => $this->curriculum_name,
                ':school_year' => $this->school_year,
            ];
        } else {
            // Insert new record
            $query = 'INSERT INTO school_year_tbl (dept_name, curriculum_name, school_year) VALUES (:dept_name, :curriculum_name, :school_year)';
            $params = [
                ':dept_name' => $this->dept_name,
                ':curriculum_name' => $this->curriculum_name,
                ':school_year' => $this->school_year,
            ];
        }

        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    // Delete a record by year_id
    public function remove()
    {
        $m = Model::getInstance();

        if ($this->year_id) {
            $stmt = $m->delete('school_year_tbl', $this->year_id);
            return $stmt->stmt->rowCount();
        }

        return 0; // No action taken if year_id is not set
    }
}
