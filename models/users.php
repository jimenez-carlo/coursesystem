<?php

class User extends Model
{
    protected $id;
    protected $student_image;
    protected $email;
    protected $password;
    protected $last_name;
    protected $first_name;
    protected $middle_name;
    protected $address;
    protected $telephone;
    protected $username;

    public function __construct($id = null, $student_image, $email, $password, $last_name, $first_name, $middle_name, $address, $telephone, $username)
    {
        $this->id = $id;
        $this->student_image = $student_image;
        $this->email = $email;
        $this->password = $password;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->address = $address;
        $this->telephone = $telephone;
        $this->username = $username;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStudent_Image()
    {
        return $this->student_image;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getLast_Name()
    {
        return $this->last_name;
    }

    public function getFirst_Name()
    {
        return $this->first_name;
    }

    public function getMiddle_Name()
    {
        return $this->middle_name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setStudent_Image($value)
    {
        $this->student_image = $value;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function setLast_Name($value)
    {
        $this->last_name = $value;
    }

    public function setFirst_Name($value)
    {
        $this->first_name = $value;
    }

    public function setMiddle_Name($value)
    {
        $this->middle_name = $value;
    }

    public function setAddress($value)
    {
        $this->address = $value;
    }

    public function setTelephone($value)
    {
        $this->telephone = $value;
    }

    public function setUsername($value)
    {
        $this->username = $value;
    }

    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('users'); // Using the provided table name 'users'
        
        if ($results) {
            foreach ($results as $row) {
                $data = new User($row['id'], $row['student_image'], $row['email'], $row['password'], $row['last_name'], $row['first_name'], $row['middle_name'], $row['address'], $row['telephone'], $row['username']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('users', 'id', $id);
        
        if ($result) {
            $data = new User($result['id'], $result['student_image'], $result['email'], $result['password'], $result['last_name'], $result['first_name'], $result['middle_name'], $result['address'], $result['telephone'], $result['username']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->id) {
            // Update existing user
            $query = 'UPDATE users SET student_image = :student_image, email = :email, password = :password, last_name = :last_name, first_name = :first_name, middle_name = :middle_name, address = :address, telephone = :telephone, username = :username WHERE id = :id';
            $params = [
                ':id' => $this->id,
                ':student_image' => $this->student_image,
                ':email' => $this->email,
                ':password' => $this->password,
                ':last_name' => $this->last_name,
                ':first_name' => $this->first_name,
                ':middle_name' => $this->middle_name,
                ':address' => $this->address,
                ':telephone' => $this->telephone,
                ':username' => $this->username,
            ];
        } else {
            // Insert new user
            $query = 'INSERT INTO users (student_image, email, password, last_name, first_name, middle_name, address, telephone, username) VALUES (:student_image, :email, :password, :last_name, :first_name, :middle_name, :address, :telephone, :username)';
            $params = [
                ':student_image' => $this->student_image,
                ':email' => $this->email,
                ':password' => $this->password,
                ':last_name' => $this->last_name,
                ':first_name' => $this->first_name,
                ':middle_name' => $this->middle_name,
                ':address' => $this->address,
                ':telephone' => $this->telephone,
                ':username' => $this->username,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->id) {
            $stmt = $m->delete('users', $this->id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}
