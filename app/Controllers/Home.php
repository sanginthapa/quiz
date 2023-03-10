<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Models\QuestionModel;
use App\Models\OptionModel;

class Home extends BaseController
{
    public function index()
    {
        return view('pages/home');
    }


    public function save_data()
    {
        if($this->request->getMethod()=='post'){
            $data = [
                'name' => $this->request->getPost('student_name'),
                'email' => $this->request->getPost('email'),
                // Add other fields here
            ];

            $validation = \Config\Services::validation();
            $validation->setRules([
                'name' => 'required',
                'email' => 'required|valid_email',
                // Add validation rules for other fields here
            ]);

            if (!$validation->run($data)) {
                // Validation failed, show error message or redirect to form page
                return 'email format didnot match';
            }else{
                $model= new StudentModel();
                $exist=$model->find($data['email']);
                $num_rows = $model->countAllResults();
                if($num_rows>0){
                    $session = \Config\Services::session();
                    $session->set('active_email', $data['email']);
                    return redirect()->to('home/quizStart');;
                }else{
                    if($model->save($data)){
                        $session = \Config\Services::session();
                        $session->set('active_email', $data['email']);
                        return redirect()->to('home/quizStart');;
                    }else{
                        return redirect()->to('home');;
                    }
                }
            }
        }else{
            echo "invalied request";
        }
    }

    public function quizStart(){
        $session = \Config\Services::session();
        echo "Welcome, " . $session->get('active_email') . "!";
        // $variable_value = $session->get('active_email');
        $db=db_connect();
        // $qn_model= new QuestionModel($db);
        // $quiz_questions=$qn_model->all();
        //getting quiry ready
        $builder = $db->table('quiz_questions');
        $builder->select('question_id');
        $builder->orderBy('RAND()');
        $builder->limit(10);
        $quiz_ids = $builder->get()->getResultArray();

        $builder = $db->table('quiz_questions');
        $builder->select('question_id, question, option_id, option');
        $builder->whereIn('question_id', $quiz_ids);
        $builder->join('options_table', 'quiz_questions.question_id = options_table.question_id');
        $builder->orderBy('question_id');
        $builder->orderBy('option_id');
        $questions = $builder->get()->getResultArray();
        // return view('question_page',$quiz_questions);
        echo '<pre>';
        print_r($questions);
        echo '<pre>';
    }

}
