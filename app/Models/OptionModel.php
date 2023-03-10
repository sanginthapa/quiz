<?php

namespace App\Models;

use CodeIgniter\Model;

class OptionModel extends Model
{
  protected $table      = 'options_table';
  protected $primaryKey = 'option_id';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['question_id','option_name','is_correct'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
}