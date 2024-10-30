<?php

class YearLevel extends Model
{
    protected $year_id;
    protected $year_year;
    protected $yearlevel_status;

    public function __construct($year_id = null, $year_year, $yearlevel_status)
    {
        $this->year_id = $year_id;
        $this->year_year = $year_year;
        $this->yearlevel_status = $yearlevel_status;
    }

    public function getYear_Id()
    {
        return $this->year_id;
    }

    public function getYear_Year()
    {
        return $this->year_year;
    }

    public function getYearlevel_Status()
    {
        return $this->yearlevel_status;
    }

    public function setYear_Id($value)
    {
        $this->year_id = $value;
    }

    public function setYear_Year($value)
    {
        $this->year_year = $value;
    }

    public function setYearlevel_Status($value)
    {
        $this->yearlevel_status = $value;
    }

    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('year_levels_tbl'); // Using the provided table name 'year_levels_tbl'
        
        if ($results) {
            foreach ($results as $row) {
                $data = new YearLevel($row['year_id'], $row['year_year'], $row['yearlevel_status']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($year_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('year_levels_tbl', 'year_id', $year_id);
        
        if ($result) {
            $data = new YearLevel($result['year_id'], $result['year_year'], $result['yearlevel_status']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->year_id) {
            // Update existing year level
            $query = 'UPDATE year_levels_tbl SET year_year = :year_year, yearlevel_status = :yearlevel_status WHERE year_id = :year_id';
            $params = [
                ':year_id' => $this->year_id,
                ':year_year' => $this->year_year,
                ':yearlevel_status' => $this->yearlevel_status,
            ];
        } else {
            // Insert new year level
            $query = 'INSERT INTO year_levels_tbl (year_year, yearlevel_status) VALUES (:year_year, :yearlevel_status)';
            $params = [
                ':year_year' => $this->year_year,
                ':yearlevel_status' => $this->yearlevel_status,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->year_id) {
            $stmt = $m->delete('year_levels_tbl', $this->year_id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}
