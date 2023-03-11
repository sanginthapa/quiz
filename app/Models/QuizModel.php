<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class QuizModel{
    protected $db;
    protected $table='quiz_questions';

    public function __construct(ConnectionInterface &$db){
        $this->db=&$db;
    }

    function allQuestions(){
        return $this->db->table($this->table)->get()->getResult();
    }

    function questionWithOption($qtn_id){
        return $this->db->table($this->table)
                        ->join('options_table','quiz_questions.question_id = options_table.question_id')
                        ->where('quiz_questions.question_id',$qtn_id)
                        ->get()
                        ->getResult();
    }

    function randomQuestionIds(){
        $builder = $this->db->table($this->table);
        $builder->select('question_id')
                ->orderBy('RAND()')
                ->limit(10);
        $query = $builder->get();
        $question_ids = $query->getResultArray();
        return $question_ids;
    }
}