<?php

class Semester extends Model
{
    protected $sem_id;
    protected $semester;
    protected $sem_status;

    public function __construct($sem_id = null, $semester, $sem_status)
    {
        $this->sem_id = $sem_id;
        $this->semester = $semester;
        $this->sem_status = $sem_status;
    }

    public function getSem_Id()
    {
        return $this->sem_id;
    }

    public function getSemester()
    {
        return $this->semester;
    }

    public function getSem_Status()
    {
        return $this->sem_status;
    }

    public function setSem_Id($value)
    {
        $this->sem_id = $value;
    }

    public function setSemester($value)
    {
        $this->semester = $value;
    }

    public function setSem_Status($value)
    {
        $this->sem_status = $value;
    }

    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('semester_tbl');  // Assuming the table is 'semester_tbl'
        
        if ($results) {
            foreach ($results as $row) {
                $data = new Semester($row['sem_id'], $row['semester'], $row['sem_status']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($sem_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('semester_tbl', 'sem_id', $sem_id);
        
        if ($result) {
            $data = new Semester($result['sem_id'], $result['semester'], $result['sem_status']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->sem_id) {
            // Update existing semester
            $query = 'UPDATE semester_tbl SET semester = :semester, sem_status = :sem_status WHERE sem_id = :sem_id';
            $params = [
                ':sem_id' => $this->sem_id,
                ':semester' => $this->semester,
                ':sem_status' => $this->sem_status,
            ];
        } else {
            // Insert new semester (let the DB auto-generate the id if it's null)
            $query = 'INSERT INTO semester_tbl (semester, sem_status) VALUES (:semester, :sem_status)';
            $params = [
                ':semester' => $this->semester,
                ':sem_status' => $this->sem_status,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->sem_id) {
            $stmt = $m->delete('semester_tbl', $this->sem_id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}  
