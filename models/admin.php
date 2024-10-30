<?php

class Course extends Model
{
    protected $admin_id;
    protected $admin_profile;
    protected $admin_email;
    protected $admin_password;
    protected $admin_firstname;
    protected $admin_lastname;
    protected $admin_position;
    protected $admin_status;

    public function __construct($admin_id = null, $admin_profile, $admin_email, $admin_password, $admin_firstname, $admin_lastname, $admin_position, $admin_status)
    {
        $this->admin_id = $admin_id;
        $this->admin_profile = $admin_profile;
        $this->admin_email = $admin_email;
        $this->admin_password = $admin_password;
        $this->admin_firstname = $admin_firstname;
        $this->admin_lastname = $admin_lastname;
        $this->admin_position = $admin_position;
        $this->admin_status = $admin_status;
    }

    public function getAdmin_Id()
    {
        return $this->admin_id;
    }

    public function getAdmin_Profile()
    {
        return $this->admin_profile;
    }

    public function getAdmin_Email()
    {
        return $this->admin_email;
    }
    public function getAdmin_password()
    {
        return $this->admin_password;
    }

    public function getAdmin_Firstname()
    {
        return $this->admin_firstname;
    }

    public function getAdmin_Lastname()
    {
        return $this->admin_lastname;
    }
    public function getAdmin_Position()
    {
        return $this->admin_position;
    }

    public function getAdmin_Status()
    {
        return $this->admin_status;
    }

    public function setAdmin_Id($value)
    {
        $this->admin_id = $value;
    }

    public function setAdmin_Profile($value)
    {
        $this->admin_profile = $value;
    }

    public function setAdmin_Email($value)
    {
        $this->admin_email = $value;
    }
    public function setAdmin_Password($value)
    {
        $this->admin_password = $value;
    }

    public function setAdmin_Firstname($value)
    {
        $this->admin_firstname = $value;
    }

    public function setAdmin_Lastname($value)
    {
        $this->admin_lastname = $value;
    }
    public function setAdmin_Position($value)
    {
        $this->admin_position = $value;
    }

    public function setAdmin_Status($value)
    {
        $this->admin_status = $value;
    }


    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('admin_tbl');
        
        if ($results) {
            foreach ($results as $row) {
                $data = new admin_tbl($row['admin_id'], $row['admin_profile'], $row['admin_email'], $row['admin_password'], $row['admin_firstname'], $row['admin_lastname'], $row['admin_position'], $row['admin_status']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($admin_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('admin_tbl', 'admin_id', $admin_id);
        
        if ($result) {
            $data = new Course($result['admin_id'], $result['admin_profile'], $result['admin_email'], $result['admin_password'], $result['admin_firstname'], $result['admin_lastname'], $result['admin_position'], $result['admin_status']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->id) {
            // Update existing course
            $query = 'UPDATE admin_tbl SET admin_profile = :admin_profile, admin_email= :admin_email, admin_password = :admin_password, admin_firstname= :admin_firstname, admin_lastname = :admin_lastname, admin_position= :admin_position, admin_status = :admin_status WHERE admin_id = :admin_id';
            $params = [
                ':admin_id' => $this->admin_id,
                ':admin_profile' => $this->admin_profile,
                ':admin_email' => $this->admin_email,
                ':admin_password' => $this->admin_password,
                ':admin_firstname' => $this->admin_firstname,
                ':admin_lastname' => $this->admin_lastname,
                ':admin_position' => $this->admin_position,
                ':admin_status' => $this->admin_status,
            ];
        } else {
            // Insert new course (let the DB auto-generate the id if it's null)
            $query = 'INSERT INTO admin_tbl (admin_profile, admin_email, admin_password, admin_firstname, admin_lastname, admin_position, admin_status) VALUES (:admin_profile, :admin_email, :admin_password, :admin_firstname, :admin_lastname, :admin_position, :admin_status)';
            $params = [
                ':admin_id' => $this->admin_id,
                ':admin_profile' => $this->admin_profile,
                ':admin_email' => $this->admin_email,
                ':admin_password' => $this->admin_password,
                ':admin_firstname' => $this->admin_firstname,
                ':admin_lastname' => $this->admin_lastname,
                ':admin_position' => $this->admin_position,
                ':admin_status' => $this->admin_status,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->id) {
            $stmt = $m->delete('admin_tbl', $this->id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}  