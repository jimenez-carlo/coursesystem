<?php

class Upload extends Model
{
    protected $upload_id;
    protected $user_id;
    protected $department_name;
    protected $ier_upload;

    public function __construct($upload_id = null, $user_id, $department_name, $ier_upload)
    {
        $this->upload_id = $upload_id;
        $this->user_id = $user_id;
        $this->department_name = $department_name;
        $this->ier_upload = $ier_upload;
    }

    public function getUpload_Id()
    {
        return $this->upload_id;
    }

    public function getUser_Id()
    {
        return $this->user_id;
    }

    public function getDepartment_Name()
    {
        return $this->department_name;
    }

    public function getIer_Upload()
    {
        return $this->ier_upload;
    }

    public function setUpload_Id($value)
    {
        $this->upload_id = $value;
    }

    public function setUser_Id($value)
    {
        $this->user_id = $value;
    }

    public function setDepartment_Name($value)
    {
        $this->department_name = $value;
    }

    public function setIer_Upload($value)
    {
        $this->ier_upload = $value;
    }

    public static function getAll()
    {
        $m = Model::getInstance();
        $list = [];
        $results = $m->all('upload_tbl'); // Using the provided table name 'upload_tbl'
        
        if ($results) {
            foreach ($results as $row) {
                $data = new Upload($row['upload_id'], $row['user_id'], $row['department_name'], $row['ier_upload']);
                $list[] = $data;
            }
        }
        
        return $list;
    }

    public static function getById($upload_id)
    {
        $m = Model::getInstance();
        $data = null;
        $result = $m->getOne('upload_tbl', 'upload_id', $upload_id);
        
        if ($result) {
            $data = new Upload($result['upload_id'], $result['user_id'], $result['department_name'], $result['ier_upload']);
        }
        
        return $data;
    }

    public function save()
    {
        $m = Model::getInstance();
        if ($this->upload_id) {
            // Update existing upload
            $query = 'UPDATE upload_tbl SET user_id = :user_id, department_name = :department_name, ier_upload = :ier_upload WHERE upload_id = :upload_id';
            $params = [
                ':upload_id' => $this->upload_id,
                ':user_id' => $this->user_id,
                ':department_name' => $this->department_name,
                ':ier_upload' => $this->ier_upload,
            ];
        } else {
            // Insert new upload
            $query = 'INSERT INTO upload_tbl (user_id, department_name, ier_upload) VALUES (:user_id, :department_name, :ier_upload)';
            $params = [
                ':user_id' => $this->user_id,
                ':department_name' => $this->department_name,
                ':ier_upload' => $this->ier_upload,
            ];
        }
        
        $result = $m->executeQuery($query, $params);
        return $result->stmt->rowCount();
    }

    public function remove()
    {
        $m = Model::getInstance();
        
        if ($this->upload_id) {
            $stmt = $m->delete('upload_tbl', $this->upload_id);
            return $stmt->stmt->rowCount();
        }
        
        return 0; // No action taken if ID is not set
    }
}
