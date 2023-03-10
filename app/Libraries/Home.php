<?php 
namespace App\Libraries;

class Home{

  public function starter(){
    return view('components/student_form');
  }

  public function quiz($user){
    return view('components/display_question',$user);
  }
}