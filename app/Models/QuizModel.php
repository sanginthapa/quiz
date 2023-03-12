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

    //calculate score
    function getScore($session_id){
        /*
        //reference 
        $sl="SELECT `question_attempts`.`student_id`, `question_attempts`.`question_id`, `question_attempts`.`option_id`,`options_table`.`option_id`, `options_table`.`is_correct` FROM `question_attempts`
        INNER JOIN options_table on question_attempts.option_id = options_table.option_id
        WHERE `question_attempts`.`session_id`=2;";
        //used here
        $sql = "SELECT COUNT(`options_table`.`is_correct`) AS score FROM `question_attempts`
        INNER JOIN options_table on question_attempts.option_id = options_table.option_id
        WHERE `question_attempts`.`session_id`=1 AND `options_table`.`is_correct`=1;";
        */
        $query = $this->db->table('question_attempts');
        $query->select('COUNT(options_table.is_correct) AS score');
        $query->join('options_table', 'question_attempts.option_id = options_table.option_id');
        $query->where('question_attempts.session_id', $session_id);
        $query->where('options_table.is_correct', 1);
        $result = $query->get()->getRow()->score;
        return $result;
      }

      function viewResult($student_id){
        $query = $this->db->table('quiz_sessions')
                        ->select('quiz_sessions.session_id, quiz_sessions.student_id, students_table.student_name, quiz_sessions.started_at, quiz_sessions.ended_at, quiz_sessions.score, quiz_sessions.is_completed, TIMEDIFF(quiz_sessions.started_at, quiz_sessions.ended_at) AS time_consumed, 
                                (SELECT COUNT(question_attempts.attempt_id) AS attempted 
                                FROM question_attempts 
                                WHERE question_attempts.session_id = quiz_sessions.session_id) AS attempted')
                        ->join('students_table', 'quiz_sessions.student_id = students_table.student_id')
                        ->where('quiz_sessions.student_id', $student_id)
                        ->orderBy('started_at', 'DESC')
                        ->get();
            // ->where('quiz_sessions.session_id', $session_id)
            
        $results = $query->getResult();
        return $results;
      }
      function viewIndividualResult($student_id,$session_id){
        $query = $this->db->table('quiz_sessions')
                        ->select('quiz_sessions.session_id, quiz_sessions.student_id, students_table.student_name, quiz_sessions.started_at, quiz_sessions.ended_at, quiz_sessions.score, quiz_sessions.is_completed, TIMEDIFF(quiz_sessions.started_at, quiz_sessions.ended_at) AS time_consumed, 
                                (SELECT COUNT(question_attempts.attempt_id) AS attempted 
                                FROM question_attempts 
                                WHERE question_attempts.session_id = quiz_sessions.session_id) AS attempted')
                        ->join('students_table', 'quiz_sessions.student_id = students_table.student_id')
                        ->where('quiz_sessions.student_id', $student_id)
                        ->orderBy('started_at', 'DESC')
                        ->get();
            // ->where('quiz_sessions.session_id', $session_id)
            
        $results = $query->getResult();
        return $results;
      }

      public function viewAllResult(){
        $query = $this->db->table('quiz_sessions')
                        ->select('quiz_sessions.session_id, quiz_sessions.student_id, students_table.student_name, quiz_sessions.started_at, quiz_sessions.ended_at, quiz_sessions.score, quiz_sessions.is_completed, TIMEDIFF(quiz_sessions.started_at, quiz_sessions.ended_at) AS time_consumed, 
                                (SELECT COUNT(question_attempts.attempt_id) AS attempted 
                                FROM question_attempts 
                                WHERE question_attempts.session_id = quiz_sessions.session_id) AS attempted')
                        ->join('students_table', 'quiz_sessions.student_id = students_table.student_id')
                        ->orderBy('started_at', 'DESC')
                        ->get();
                        // ->where('quiz_sessions.student_id', $student_id)
                        // ->where('quiz_sessions.session_id', $session_id)            
        $results = $query->getResult();
        return $results;
      }

      public function viewAllQnAofaSession($session_id){
        
      }
}