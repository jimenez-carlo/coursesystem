<?php

class Program extends Model
{
    protected $program_id;
    protected $dept_program;
    protected $program_status;

    public function __construct($program_id = null, $dept_program, $program_status)
    {
        $this->program_id = $program_id;
        $this->dept_program = $dept_program;
        $this->program_status = $program_status;
    }

    // Getters
    public function getProgram_Id()
    {
        return $this->program_id;
    }

    public function getDept_Program()
    {
        return $this->dept_program;
    }

    public function getProgram_Status()
    {
        return $this->program_status;
    }

    // Setters
    public function setProgram_Id($value)
    {
        $this->program_id = $value;
    }

    public function setDept_Program($value)
    {
        $this->dept_program = $value;
    }

    public function setProgram_Status($value)
    {
        $this->program_status = $value;
    }

    // Retrieve all records from the database
    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('program_tbl'); // Assuming the table name is 'program_tbl'

        if ($results) {
            foreach ($results as $row) {
                $data = new Program($row['program_id'], $row['dept_program'], $row['program_status']);
                $list[] = $data;
            }
        }

        return $list;
    }

    // Retrieve a record by program_id
    public static function getById($program_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('program_tbl', 'program_id', $program_id);

        if ($result) {
            $data = new Program($result['program_id'], $result['dept_program'], $result['program_status']);
        }

        return $data;
    }

    // Save or update a record
    public function save()
    {
        $m = Model::getInstance();
        if ($this->program_id) {
            // Update existing record
            $query = 'UPDATE program_tbl SET dept_program = :dept_program, program_status = :program_status WHERE program_id = :program_id';
            $params = [
                ':program_id' => $this->program_id,
                ':dept_program' => $this->dept_program,
                ':program_status' => $this->program_status,
            ];
        } else {
            // Insert new record
            $query = 'INSERT INTO program_tbl (dept_program, program_status) VALUES (:dept_program, :program_status)';
            $params = [
                ':dept_program' => $this->dept_program,
                ':program_status' => $this->program_status,
            ];
        }

        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    // Delete a record by program_id
    public function remove()
    {
        $m = Model::getInstance();

        if ($this->program_id) {
            $stmt = $m->delete('program_tbl', $this->program_id);
            return $stmt->stmt->rowCount();
        }

        return 0; // No action taken if program_id is not set
    }
}
