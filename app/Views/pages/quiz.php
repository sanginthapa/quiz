<?= $this->extend('./layouts/main')?>
<?= $this->section('content')?>
<h1 class="text-center">Quiz Maniya</h1>
<?php //print_r($qna); ?>
<hr>
<?php
  $session = \Config\Services::session();
  $variable_value = $session->get('questionSet');
  print_r($variable_value);
$question='';
$option[]=''; 
$i=0;
?>
<?php foreach($qna as $qn): 
  $question=$qn->question;
  $option[$i]=$qn->option_name; 
  $i++;
 endforeach; 
 ?>
 Q.<?= $question ?>?<br>
<?php foreach($qna as $qn): ?>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn">
    <input name="option" type="radio" id="<?= $qn->option_id; ?>"> <?= $qn->option_name; ?>
  </label>
</div>
<?php endforeach; ?>
<hr>
<?= view_cell('\App\Libraries\Home::quiz',['question'=>$question,'option'=>$qna]) ?>
<?= $this->endSection()?>