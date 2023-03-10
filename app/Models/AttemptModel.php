<?php

namespace App\Models;

use CodeIgniter\Model;

class AttemptModel extends Model
{
  protected $table      = 'question_attempts';
  protected $primaryKey = 'attempt_id';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['student_id', 'question_id','option_id'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
}