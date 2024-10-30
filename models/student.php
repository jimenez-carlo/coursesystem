<?php

class Student extends Model
{
    protected $student_idno;
    protected $student_no;
    protected $first_name;
    protected $middle_name;
    protected $last_name;
    protected $student_street;
    protected $student_brgy;
    protected $student_municipality;
    protected $student_year;
    protected $student_course;
    protected $student_major;
    protected $contact_no;

    public function __construct($student_idno = null, $student_no, $first_name, $middle_name, $last_name, $student_street, $student_brgy, $student_municipality, $student_year, $student_course, $student_major, $contact_no)
    {
        $this->student_idno = $student_idno;
        $this->student_no = $student_no;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->student_street = $student_street;
        $this->student_brgy = $student_brgy;
        $this->student_municipality = $student_municipality;
        $this->student_year = $student_year;
        $this->student_course = $student_course;
        $this->student_major = $student_major;
        $this->contact_no = $contact_no;
    }

    public function getStudent_Idno()
    {
        return $this->student_idno;
    }

    public function getStudent_No()
    {
        return $this->student_no;
    }

    public function getFirst_Name()
    {
        return $this->first_name;
    }

    public function getMiddle_Name()
    {
        return $this->middle_name;
    }

    public function getLast_Name()
    {
        return $this->last_name;
    }

    public function getStudent_Street()
    {
        return $this->student_street;
    }

    public function getStudent_Brgy()
    {
        return $this->student_brgy;
    }

    public function getStudent_Municipality()
    {
        return $this->student_municipality;
    }

    public function getStudent_Year()
    {
        return $this->student_year;
    }

    public function getStudent_Course()
    {
        return $this->student_course;
    }

    public function getStudent_Major()
    {
        return $this->student_major;
    }

    public function getContact_No()
    {
        return $this->contact_no;
    }

    public function setStudent_Idno($value)
    {
        $this->student_idno = $value;
    }

    public function setStudent_No($value)
    {
        $this->student_no = $value;
    }

    public function setFirst_Name($value)
    {
        $this->first_name = $value;
    }

    public function setMiddle_Name($value)
    {
        $this->middle_name = $value;
    }

    public function setLast_Name($value)
    {
        $this->last_name = $value;
    }

    public function setStudent_Street($value)
    {
        $this->student_street = $value;
    }

    public function setStudent_Brgy($value)
    {
        $this->student_brgy = $value;
    }

    public function setStudent_Municipality($value)
    {
        $this->student_municipality = $value;
    }

    public function setStudent_Year($value)
    {
        $this->student_year = $value;
    }

    public function setStudent_Course($value)
    {
        $this->student_course = $value;
    }

    public function setStudent_Major($value)
    {
        $this->student_major = $value;
    }

    public function setContact_No($value)
    {
        $this->contact_no = $value;
    }

    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('student_tbl');  // Assuming the table is 'student_tbl'
        
        if ($results) {
            foreach ($results as $row) {
                $data = new Student($row['student_idno'], $row['student_no'], $row['first_name'], $row['middle_name'], $row['last_name'], $row['student_street'], $row['student_brgy'], $row['student_municipality'], $row['student_year'], $row['student_course'], $row['student_major'], $row['contact_no']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($student_idno)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('student_tbl', 'student_idno', $student_idno);
        
        if ($result) {
            $data = new Student($result['student_idno'], $result['student_no'], $result['first_name'], $result['middle_name'], $result['last_name'], $result['student_street'], $result['student_brgy'], $result['student_municipality'], $result['student_year'], $result['student_course'], $result['student_major'], $result['contact_no']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->student_idno) {
            // Update existing student record
            $query = 'UPDATE student_tbl SET student_no = :student_no, first_name = :first_name, middle_name = :middle_name, last_name = :last_name, student_street = :student_street, student_brgy = :student_brgy, student_municipality = :student_municipality, student_year = :student_year, student_course = :student_course, student_major = :student_major, contact_no = :contact_no WHERE student_idno = :student_idno';
            $params = [
                ':student_idno' => $this->student_idno,
                ':student_no' => $this->student_no,
                ':first_name' => $this->first_name,
                ':middle_name' => $this->middle_name,
                ':last_name' => $this->last_name,
                ':student_street' => $this->student_street,
                ':student_brgy' => $this->student_brgy,
                ':student_municipality' => $this->student_municipality,
                ':student_year' => $this->student_year,
                ':student_course' => $this->student_course,
                ':student_major' => $this->student_major,
                ':contact_no' => $this->contact_no,
            ];
        } else {
            // Insert new student record
            $query = 'INSERT INTO student_tbl (student_no, first_name, middle_name, last_name, student_street, student_brgy, student_municipality, student_year, student_course, student_major, contact_no) VALUES (:student_no, :first_name, :middle_name, :last_name, :student_street, :student_brgy, :student_municipality, :student_year, :student_course, :student_major, :contact_no)';
            $params = [
                ':student_no' => $this->student_no,
                ':first_name' => $this->first_name,
                ':middle_name' => $this->middle_name,
                ':last_name' => $this->last_name,
                ':student_street' => $this->student_street,
                ':student_brgy' => $this->student_brgy,
                ':student_municipality' => $this->student_municipality,
                ':student_year' => $this->student_year,
                ':student_course' => $this->student_course,
                ':student_major' => $this->student_major,
                ':contact_no' => $this->contact_no,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->student_idno) {
            $stmt = $m->delete('student_tbl', $this->student_idno);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}  
