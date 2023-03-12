<?= $this->extend('./layouts/main')?>
<?= $this->section('content')?>
<h1 class="text-center mt-5">Quiz Maniya</h1>
<?php //print_r($qna); ?>
<hr>
<?php
  $session = \Config\Services::session();
  $variable_value = $session->get('questionSet');
  // print_r($variable_value);
  
$question_id='';
$question='';
$option[]=''; 
$i=0;
?>
<?php foreach($qna as $qn): 
  $question_id=$qn->question_id;
  $question=$qn->question;
  $option[$i]=$qn->option_name; 
  $i++;
 endforeach; 
 ?>
<hr>
<?= view_cell('\App\Libraries\Home::quiz',['question_id'=>$question_id,'question'=>$question,'option'=>$qna]) ?>
<?= $this->endSection()?>