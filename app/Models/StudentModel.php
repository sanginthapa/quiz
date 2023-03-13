<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
  protected $table      = 'students_table';
  protected $primaryKey = 'student_id';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['student_name', 'email'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  public function getStudentId($email){
    $student_id = $this->where('email', $email)->first();
    // print_r($student_id);
        if ($student_id) {
            return $student_id['student_id'];
        } else {
            return null;
        }
  }
  public function getStudentDetails($email){
    $student_id = $this->where('email', $email)->first();
    // print_r($student_id);
        if ($student_id) {
            return $student_id;
        } else {
            return null;
        }
  }
}