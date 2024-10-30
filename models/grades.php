<?php

class Course extends Model
{
    protected $grades_id;
    protected $student_id;
    protected $currdetails_id;
    protected $grade;
    protected $semesters;
    protected $school_year;
    protected $confirmations;

    public function __construct($grades_id = null, $student_id, $currdetails_id, $grade, $semesters, $school_year, $confirmations)
    {
        $this->grades_id = $grades_id;
        $this->student_id = $student_id;
        $this->currdetails_id = $currdetails_id;
        $this->grade = $grade;
        $this->semesters = $semesters;
        $this->school_year = $school_year;
        $this->confirmations = $confirmations;
    }

    // Getters
    public function getGrades_Id()
    {
        return $this->grades_id;
    }

    public function getStudent_Id()
    {
        return $this->student_id;
    }

    public function getCurrdetails_Id()
    {
        return $this->currdetails_id;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function getSemesters()
    {
        return $this->semesters;
    }

    public function getSchool_Year()
    {
        return $this->school_year;
    }

    public function getConfirmations()
    {
        return $this->confirmations;
    }

    // Setters
    public function setGrades_Id($value)
    {
        $this->grades_id = $value;
    }

    public function setStudent_Id($value)
    {
        $this->student_id = $value;
    }

    public function setCurrdetails_Id($value)
    {
        $this->currdetails_id = $value;
    }

    public function setGrade($value)
    {
        $this->grade = $value;
    }

    public function setSemesters($value)
    {
        $this->semesters = $value;
    }

    public function setSchool_Year($value)
    {
        $this->school_year = $value;
    }

    public function setConfirmations($value)
    {
        $this->confirmations = $value;
    }

    // Retrieve all records from the database
    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('grades_tbl');

        if ($results) {
            foreach ($results as $row) {
                $data = new Course($row['grades_id'], $row['student_id'], $row['currdetails_id'], $row['grade'], $row['semesters'], $row['school_year'], $row['confirmations']);
                $list[] = $data;
            }
        }

        return $list;
    }

    // Retrieve a record by grades_id
    public static function getById($grades_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('grades_tbl', 'grades_id', $grades_id);

        if ($result) {
            $data = new Course($result['grades_id'], $result['student_id'], $result['currdetails_id'], $result['grade'], $result['semesters'], $result['school_year'], $result['confirmations']);
        }

        return $data;
    }

    // Save or update a record
    public function save()
    {
        $m = Model::getInstance();
        if ($this->grades_id) {
            // Update existing record
            $query = 'UPDATE grades_tbl SET student_id = :student_id, currdetails_id = :currdetails_id, grade = :grade, semesters = :semesters, school_year = :school_year, confirmations = :confirmations WHERE grades_id = :grades_id';
            $params = [
                ':grades_id' => $this->grades_id,
                ':student_id' => $this->student_id,
                ':currdetails_id' => $this->currdetails_id,
                ':grade' => $this->grade,
                ':semesters' => $this->semesters,
                ':school_year' => $this->school_year,
                ':confirmations' => $this->confirmations,
            ];
        } else {
            // Insert new record
            $query = 'INSERT INTO grades_tbl (student_id, currdetails_id, grade, semesters, school_year, confirmations) VALUES (:student_id, :currdetails_id, :grade, :semesters, :school_year, :confirmations)';
            $params = [
                ':student_id' => $this->student_id,
                ':currdetails_id' => $this->currdetails_id,
                ':grade' => $this->grade,
                ':semesters' => $this->semesters,
                ':school_year' => $this->school_year,
                ':confirmations' => $this->confirmations,
            ];
        }

        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    // Delete a record by grades_id
    public function remove()
    {
        $m = Model::getInstance();

        if ($this->grades_id) {
            $stmt = $m->delete('grades_tbl', $this->grades_id);
            return $stmt->stmt->rowCount();
        }

        return 0; // No action taken if grades_id is not set
    }
}
