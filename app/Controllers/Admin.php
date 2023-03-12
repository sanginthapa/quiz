<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\AttemptModel;
use App\Models\StudentModel;
use App\Models\QuestionModel;
use App\Models\OptionModel;
use App\Models\QuizModel;
use CodeIgniter\Controller;
use App\Models\QuizSessionModel;


class Admin extends BaseController
{
    public function index(){
      $session = \Config\Services::session();
      if($session->get('admin')!=''){
        $model=new QuizModel($db);
        $result=$model->viewAllResult();
        // print_r($result);
        return view('pages/dashboard',['result'=>$result]);
      }else{
        return view('pages/login');
      }
    }

    public function dashboard()
    {
      $session = \Config\Services::session();
      
      if ($this->request->getMethod() === 'post') {
        $data = [
          'email' => $this->request->getPost('email'),
          'password' => $this->request->getPost('password')
        ];
        $validation = \Config\Services::validation();
            $validation->setRules([
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]',
            ]);

            if (!$validation->run($data)) {
                // Validation failed, show error message or redirect to form page
                $data['validation']=$this->validator;
                return '<h3 style="text-align: center;margin-top:35vh;">Wrong Email format didnot match. <a href="'.base_url('/admin').'"> Go Back </a></h3>';
            }else{
              $db=db_connect();
              $model= new AdminModel($db);
              $isAdmin=$model->where('email',$data['email'])
                    ->where('password',$data['password'])
                    ->first();

              if($isAdmin){
                $session->set('admin',$data['email']);
                $model=new QuizModel($db);
                $result=$model->viewAllResult();
                // print_r($result);
                return view('pages/dashboard',['result'=>$result]);
              }else{
                return '<h2 style="text-align: center;margin-top:35vh;">Wrong Email didnot match. <a href="'.base_url('/admin').'"> Go Back </a></h2>';
              }
            }
      }else if($session->get('admin')!=''){
        $model=new QuizModel($db);
        $result=$model->viewAllResult();
        // print_r($result);
        return view('pages/dashboard',['result'=>$result]);
      }else{
        return view('pages/login');
      }

      // return view('admin/login', $data);
    }

    public function singleReport($session_id){
      echo "single session report of session id :".$session_id;
    }

    public function logout()
    {
      $session = \Config\Services::session();
      $session->remove('admin');
      return redirect()->to(base_url('/admin'));
    }
  }
