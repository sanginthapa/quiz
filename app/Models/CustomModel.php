<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class CustomModel{
    protected $db;

    public function __construct(ConnectionInterface &$db){
        $this->db=&$db;
    }

    public function getQuizQuestion($id){
        $quizQuestionModel = new QuestionModel();
    }
}