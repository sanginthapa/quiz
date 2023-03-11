<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizSessionModel extends Model
{
    protected $table = 'quiz_sessions';
    protected $primaryKey = 'session_id';
    protected $allowedFields = ['student_id','start_at', 'ended_at', 'score','is_completed'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

}