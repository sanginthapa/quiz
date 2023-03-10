<?= $this->extend('./layouts/main')?>
<?= $this->section('content')?>
<h1 class="text-center">Quiz Maniya</h1>
<?= view_cell('\App\Libraries\Home::quiz') ?>
<?= $this->endSection()?>