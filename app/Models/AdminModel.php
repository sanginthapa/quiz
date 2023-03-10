<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
  protected $table      = 'admin_user';
  protected $primaryKey = 'admin_id';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['username', 'email','password'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
}