<?php

class Subject extends Model
{
    protected $code_id;
    protected $subject_name;
    protected $subject_title;
    protected $subject_unit;
    protected $prerequisites;
    protected $course_status;
    protected $create_at;

    public function __construct($code_id = null, $subject_name, $subject_title, $subject_unit, $prerequisites, $course_status, $create_at)
    {
        $this->code_id = $code_id;
        $this->subject_name = $subject_name;
        $this->subject_title = $subject_title;
        $this->subject_unit = $subject_unit;
        $this->prerequisites = $prerequisites;
        $this->course_status = $course_status;
        $this->create_at = $create_at;
    }

    public function getCode_Id()
    {
        return $this->code_id;
    }

    public function getSubject_Name()
    {
        return $this->subject_name;
    }

    public function getSubject_Title()
    {
        return $this->subject_title;
    }

    public function getSubject_Unit()
    {
        return $this->subject_unit;
    }

    public function getPrerequisites()
    {
        return $this->prerequisites;
    }

    public function getCourse_Status()
    {
        return $this->course_status;
    }

    public function getCreate_At()
    {
        return $this->create_at;
    }

    public function setCode_Id($value)
    {
        $this->code_id = $value;
    }

    public function setSubject_Name($value)
    {
        $this->subject_name = $value;
    }

    public function setSubject_Title($value)
    {
        $this->subject_title = $value;
    }

    public function setSubject_Unit($value)
    {
        $this->subject_unit = $value;
    }

    public function setPrerequisites($value)
    {
        $this->prerequisites = $value;
    }

    public function setCourse_Status($value)
    {
        $this->course_status = $value;
    }

    public function setCreate_At($value)
    {
        $this->create_at = $value;
    }

    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('subject_tbl');  // Using the provided table name 'subject_tbl'
        
        if ($results) {
            foreach ($results as $row) {
                $data = new Subject($row['code_id'], $row['subject_name'], $row['subject_title'], $row['subject_unit'], $row['prerequisites'], $row['course_status'], $row['create_at']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($code_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('subject_tbl', 'code_id', $code_id);
        
        if ($result) {
            $data = new Subject($result['code_id'], $result['subject_name'], $result['subject_title'], $result['subject_unit'], $result['prerequisites'], $result['course_status'], $result['create_at']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->code_id) {
            // Update existing subject
            $query = 'UPDATE subject_tbl SET subject_name = :subject_name, subject_title = :subject_title, subject_unit = :subject_unit, prerequisites = :prerequisites, course_status = :course_status, create_at = :create_at WHERE code_id = :code_id';
            $params = [
                ':code_id' => $this->code_id,
                ':subject_name' => $this->subject_name,
                ':subject_title' => $this->subject_title,
                ':subject_unit' => $this->subject_unit,
                ':prerequisites' => $this->prerequisites,
                ':course_status' => $this->course_status,
                ':create_at' => $this->create_at,
            ];
        } else {
            // Insert new subject
            $query = 'INSERT INTO subject_tbl (subject_name, subject_title, subject_unit, prerequisites, course_status, create_at) VALUES (:subject_name, :subject_title, :subject_unit, :prerequisites, :course_status, :create_at)';
            $params = [
                ':subject_name' => $this->subject_name,
                ':subject_title' => $this->subject_title,
                ':subject_unit' => $this->subject_unit,
                ':prerequisites' => $this->prerequisites,
                ':course_status' => $this->course_status,
                ':create_at' => $this->create_at,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->code_id) {
            $stmt = $m->delete('subject_tbl', $this->code_id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}
