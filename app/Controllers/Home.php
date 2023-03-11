<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Models\QuestionModel;
use App\Models\OptionModel;
use App\Models\QuizModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        if($session->get('active_email')!=''){
            $session->remove('variable_name');
            $session->destroy();
        }else{
            $session->destroy();
        }
        return view('pages/home');
    }
    
    
    public function save_data()
    {
        if($this->request->getMethod()=='post'){
            $data = [
                'student_name' => $this->request->getPost('student_name'),
                'email' => $this->request->getPost('email'),
                // Add other fields here
            ];

            $validation = \Config\Services::validation();
            $validation->setRules([
                'student_name' => 'required',
                'email' => 'required|valid_email',
                // Add validation rules for other fields here
            ]);

            if (!$validation->run($data)) {
                // Validation failed, show error message or redirect to form page
                $data['validation']=$this->validator;
                echo view('pages/home',$data);
                return '<div class="col-12 mb-5 text-center m-auto text-danger">email format didnot match</div>';
            }else{
                $db=db_connect();
                $model= new StudentModel($db);
                $model->where('email',$data['email']);
                $num_rows = $model->countAllResults();
                if($num_rows>0){
                    $session = \Config\Services::session();
                    $session->set('active_email', $data['email']);
                    $link=$this->quizStart();
                    return redirect()->to(base_url($link));
                    // return redirect()->to('/home/quizStart');;
                }else{
                    if($model->save($data)){
                        $session = \Config\Services::session();
                        $session->set('active_email', $data['email']);
                        // return redirect()->to('/home/quizStart');;
                        $link=$this->quizStart();
                        return redirect()->to(base_url($link));
                    }else{
                        // return redirect()->to('/home');
                        return '<div class="col-12 mb-5 text-center m-auto text-danger">Something Went wrong Please try again.</div>';
                    }
                }
            }
        }else{
            echo "invalied request";
        }
    }
    
    public function quizStart(){
        $session = \Config\Services::session();
        $variable_value = $session->get('active_email');
        $db=db_connect();
        $model = new QuizModel($db);
        $result['question_ids'] = $model->randomQuestionIds();
        $questionIds=[];
        foreach($result['question_ids'] as $ids){
            $questionIds[]=$ids['question_id'];
        }
        $session->set('questionSet', $questionIds);
        $session->set('counter', 0);
        $counter=$session->get('counter');
        $model = new QuizModel($db);
        // $question['qna']=$model->questionWithOption($questionIds[0]);
        // return view('pages/quiz',$question);
        // echo $questionIds[0];
        // $this->questionWithOption($questionIds[$counter]);
        $link="home/questionWithOption/".$questionIds[$counter];
        return $link;
        // return redirect()->to($link);
    }
    
    public function quizQuestions(){
        $db=db_connect();
        $model = new QuizModel($db);
        $result['questions'] = $model->allQuestions();
        // echo '<pre>';
        // print_r($result['questions']);
        // echo '<pre>';
        return view('pages/questions_list',$result);
    }
    
    public function getQuestionIds(){
        $db=db_connect();
        $model = new QuizModel($db);
        $result['question_ids'] = $model->randomQuestionIds();
        $questionIds=[];
        foreach($result['question_ids'] as $ids){
            $questionIds[]=$ids['question_id'];
        }
        // print_r($result['question_ids']);
        // print_r($questionIds);
        // foreach($questionIds as $qid){
            //     echo "<br>".$qid;
            // }
            return $questionIds;
    }
        
    public function questionWithOption($qtn_id){
        // echo "i am called";
        $db=db_connect();
        //setting veriables
        $result=[];
        $session = \Config\Services::session();
        $questionSet=$session->get('questionSet');
        $counter=$session->get('counter');
        $prev=0;
        if($counter==0){
            $prev=0;
        }else{
            $prev=$counter-1;
        }
        $previous_qtn_id=$questionSet[$prev];
        if($qtn_id==$previous_qtn_id){
            //question id matched
            $counter=$prev;
            $counter=$counter+1;
            $session->set('counter', $counter);
            $model = new QuizModel($db);
            $result['qna']=$model->questionWithOption($qtn_id);
            $total=count($questionSet);
            $result['percentage']=100-((($total-$counter)/$total)*100);
            $result['counter']=$counter;
            $result['total']=$total;
            $result['active_email']=$session->get('active_email');
            if($counter>=$total){
                $counter=$total;
                $result['showResult']='home/viewResult';
            }
            else{
                $result['nextQtn']=$questionSet[$counter];
            }
            return view('pages/quiz',$result);
        }
        else if($this->request->getMethod()=='post'){
            $submmit_data=[
                'question_id' => $this->request->getPost('question_id'),
                'option_id' => $this->request->getPost('option_id')
            ];
            print_r($submmit_data);
            $validation = \Config\Services::validation();
            $validation->setRules([
                'question_id' => 'required',
                'option_id' => 'required',
                // Add validation rules for other fields here
            ]);
            
            if (!$validation->run($submmit_data)){
                $counter=$prev;
                $counter=$counter+1;
                $session->set('counter', $counter);
                $model = new QuizModel($db);
                $result['qna']=$model->questionWithOption($previous_qtn_id);
                $total=count($questionSet);
                $result['percentage']=100-((($total-$counter)/$total)*100);
                $result['counter']=$counter;
                $result['total']=$total;
                $result['active_email']=$session->get('active_email');
                $result['error_msg']="Must select the option.";
                if($counter>=$total){
                    $counter=$total;
                    $result['showResult']='home/viewResult';
                }
                else{
                    $result['nextQtn']=$questionSet[$counter];
                }
                return view('pages/quiz',$result);
            }else{
                //now insert save data
                echo "now save data";
                $counter=$counter+1;
                $session->set('counter', $counter);
                $model = new QuizModel($db);
                $result['qna']=$model->questionWithOption($qtn_id);
                $total=count($questionSet);
                $result['percentage']=100-((($total-$counter)/$total)*100);
                $result['counter']=$counter;
                $result['total']=$total;
                $result['active_email']=$session->get('active_email');
                if($counter>=$total){
                    $counter=$total;
                    $result['showResult']='home/viewResult';
                }
                else{
                    $result['nextQtn']=$questionSet[$counter];
                }
                return view('pages/quiz',$result);
            }
        }else{
            echo "error processing data";
        }
        // else{
        //     $counter=$counter+1;
        //     $session->set('counter', $counter);
        //     $model = new QuizModel($db);
        //     $result['qna']=$model->questionWithOption($qtn_id);
        //     $total=count($questionSet);
        //     $result['percentage']=100-((($total-$counter)/$total)*100);
        //     $result['counter']=$counter;
        //     $result['total']=$total;
        //     $result['active_email']=$session->get('active_email');
        //     if($counter>=$total){
        //         $counter=$total;
        //         $result['showResult']='home/viewResult';
        //     }
        //     else{
        //         $result['nextQtn']=$questionSet[$counter];
        //     }
        // }
        // print_r($result);
    }

    public function keeper(){
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