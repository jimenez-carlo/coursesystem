<?php

class Course extends Model
{
    protected $cdetails_id;
    protected $curriculum_id;
    protected $subject_id;
    protected $year_id;
    protected $semester_id;

    public function __construct($cdetails_id = null, $curriculum_id, $subject_id, $year_id, $semester_id)
    {
        $this->cdetails_id = $cdetails_id;
        $this->curriculum_id = $curriculum_id;
        $this->subject_id = $subject_id;
        $this->year_id = $year_id;
        $this->semester_id = $semester_id;
    }

    public function getCdetails_Id()
    {
        return $this->cdetails_id;
    }

    public function getCurriculum_Id()
    {
        return $this->curriculum_id;
    }

    public function getSubject_Id()
    {
        return $this->subject_id;
    }
    public function getYear_Id()
    {
        return $this->year_id;
    }
    public function getSemester_Id()
    {
        return $this->semester_id;
    }

    public function setCdetails_Id($value)
    {
        $this->cdetails_id = $value;
    }

    public function setCurriculum_Id($value)
    {
        $this->curriculum_id = $value;
    }

    public function setSubject_Id($value)
    {
        $this->subject_id = $value;
    }
    public function setYear_Id($value)
    {
        $this->year_id = $value;
    }

    public function setSemester_id($value)
    {
        $this->semester_id = $value;
    }


    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('curriculum_details_tbl');
        
        if ($results) {
            foreach ($results as $row) {
                $data = new curriculum_details_tbl($row['cdetails_id'], $row['curriculum_id'], $row['subject_id'], $row['year_id'], $row['semester_id']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($cdetails_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('curriculum_details_tbl', 'cdetails_id', $cdetails_id);
        
        if ($result) {
            $data = new Course($result['cdetails_id'], $result['curriculum_id'], $result['subject_id'], $result['year_id'], $result['semester id'],);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->id) {
            // Update existing course
            $query = 'UPDATE curriculum_details SET curriculum_id = :curriculum_id, subject_id= : subject_id , year_id = :year_id, semester_id= :semester_id  WHERE cdetails_id = :cdetails_id';
            $params = [
                ':cdetails_id' => $this->cdetails_id,
                ':curriculum_id' => $this->curriculum_id,
                ':subject_id' => $this->subject_id,
                ':year_id' => $this->year_id,
                ':semester_id' => $this->semester_id,
            ];
        } else {
            // Insert new course (let the DB auto-generate the id if it's null)
            $query = 'INSERT INTO curriculum?_details_tbl (curriculum_id, subject_id, subject_id, year_id, semester_id) VALUES (:cdetails_php, :curriculum_id, :subject_id, year_id :semester_id)';
            $params = [
                ':cdetails_id' => $this->cdetails_id,
                ':curriculum_id' => $this->curriculum_id,
                ':subject_id' => $this->subject_id,
                ':year_id' => $this->year_id,
                ':semester_id' => $this->semester_id,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->cdetails_id) {
            $stmt = $m->delete('curriculum_details_tbl', $this->cdetails_id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}  