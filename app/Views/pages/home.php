<?= $this->extend('./layouts/main')?>
<?= $this->section('content')?>
<h1 class="text-center mt-5">Enter your name and email to start</h1>
<?= view_cell('\App\Libraries\Home::starter') ?>
<?= $this->endSection()?>