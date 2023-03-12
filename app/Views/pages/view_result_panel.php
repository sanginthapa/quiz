<?= $this->extend('./layouts/main')?>
<?= $this->section('content')?>
<h2 class="text-center">Form</h2><br>
<div class="container">
  <div class="col-6 m-auto">
    <form method="post" action="">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control w-75" id="email" name="email">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<?= $this->endSection()?>