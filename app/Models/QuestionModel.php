<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
  protected $table      = 'quiz_questions';
  protected $primaryKey = 'question_id';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['question'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
}