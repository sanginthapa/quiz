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
      return view('pages/login');
    }

    public function login()
    {
      $data = [];
      
      if ($this->request->getMethod() === 'post') {
        $rules = [
          'email' => 'required|valid_email',
          'password' => 'required|min_length[6]',
        ];
        
        if ($this->validate($rules)) {
          $model = new AdminModel();
          $admin = $model->where('email', $this->request->getPost('email'))
          ->first();
          $password=$this->request->getPost('password');
          if ($admin && password_verify($password, $admin['password'])) {
            $session = \Config\Services::session();
            $session->set('admin', $admin);
            return redirect()->to('/dashboard');
          } else {
            $data['error'] = 'Invalid login credentials.';
          }
        } else {
          $data['validation'] = $this->validator;
        }
      }

      return view('admin/login', $data);
    }

    public function logout()
    {
      $session = \Config\Services::session();
      $session->remove('admin');
      return redirect()->to('/');
    }
  }
