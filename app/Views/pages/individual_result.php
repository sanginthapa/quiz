<?= $this->extend('./layouts/main')?>
<?= $this->section('content')?>
Individual Result Page<br>
<ol>
  
  <?php foreach($result as $data):?>
            <li><a href="<?= $data->student_name;?>"><?= $data->student_name; ?></a></li>
  <?php endforeach; ?>

</ol>
<?= $this->endSection()?>