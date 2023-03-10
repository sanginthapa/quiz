<?= $this->extend('./layouts/main')?>
<?= $this->section('content')?>
<h1 class="text-center">Enter your name and email to start</h1>
<?= view_cell('\App\Libraries\Home::starter') ?>
<?= $this->endSection()?>