<?= $this->extend('./layouts/main')?>
<?= $this->section('content')?>
<h1 class="text-center mt-5">Enter your name and email to start</h1>
<?php if(isset($validation)): ?>
  <div class="text-danger">
    <?= $validation->listErrors(); ?>
  </div>
<?php endif;?>
<?= view_cell('\App\Libraries\Home::starter') ?>
<?= $this->endSection()?>