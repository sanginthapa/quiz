
following are list of questions<br>
<ol>
  
  <?php foreach($questions as $question):?>
            <li><a href="questionWithOption/<?= $question->question_id;?>"><?= $question->question; ?></a></li>
  <?php endforeach; ?>

</ol>