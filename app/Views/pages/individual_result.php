<?= $this->extend('./layouts/main')?>
<?= $this->section('content')?>
Individual Result Page<br>

<!-- //table  -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">s.n.</th>
      <th scope="col">Student Name</th>
      <th scope="col">Score/Correct</th>
      <th scope="col">Attempted</th>
      <th scope="col">Total Questions</th>
      <th scope="col">Start Time</th>
      <th scope="col">Time Consume</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $sn=1; foreach($result as $data):?>
      <tr>
      <th scope="row"><?= $sn++ ?></th>
      <td><?= $data->student_name; ?></td>
      <td><?= $data->score; ?></td>
      <td><?= $data->attempted ?></td>
      <td><?= $data->attempted ?></td>
      <td><?= $data->started_at; ?></td>
      <td><?= $data->time_consumed ?></td>
      <td><?= $data->session_id ?>Attempts</td>
    </tr>
    <?php  endforeach; ?>
  </tbody>
</table>
<!-- //table  -->
<ol>
            <li><a href="<?= $data->student_name;?>"><?= $data->student_name; ?></a></li>
</ol>
<?= $this->endSection()?>