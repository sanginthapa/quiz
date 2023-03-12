<?= $this->extend('./layouts/main')?>
<?= $this->section('content')?>
<a href="<?= previous_url() ?>" class="btn bg-primary-subtle mt-5">Back</a>
<div class="h3 text-center my-5 border-bottom border-3">Report Page</div>
<!-- display card  -->
  <?php 
  //var for result
  $correct=0;
  $wrong=0;
  $total=0;
  ?>
  <div class="container">
      <?php $sn=1; foreach($result as $data):?>
        <?php $total++?>
        <div class="col">
          <div class="card my-4">
            <h5 class="card-title ps-5 pt-4 pb-2"><?= $sn++ ?>. <?= $data->question; ?></h5>
            <div class="card-body ps-5 pb-4 pt-2 d-flex">
              <?php
              if($data->selected_option_id==$data->correct_option_id){ ?>
                <?php $correct++?>
                <div class="col-2 p-2 me-3 bg-success-subtle border border-success rounded-pill text-center"><?= $data->selected_option_name ?></div>
                <div class="col-2"><img style="width:20px;height:auto;" src="<?= base_url('assets/images/true.png')?>" alt="correct"></div>
                <?php  }else if($data->selected_option_id!=$data->correct_option_id){ ?>
                  <?php $wrong++?>
                <div class="col-2 p-2 me-3 bg-danger-subtle border border-danger rounded-pill text-center"><?= $data->selected_option_name ?></div>
                <div class="col-2"><img style="width:20px;height:auto;" src="<?= base_url('assets/images/false.png')?>" alt="Wrong"></div>
                <div class="col-2 p-2 bg-success-subtle border border-success rounded-pill text-center"><?= $data->correct_option_name ?></div>
            <?php }
              ?>
            </div>
          </div>
        </div>
      <?php  endforeach; ?>
      <div class="col mb-5">
                <div class="card my-4 <?php if($correct>7){echo "bg-success-subtle border border-success";}else if($correct>=5 || $correct<=7 ){echo "bg-warning-subtle border border-warning";} else if($correct<5){echo "bg-danger-subtle border border-danger";}?>">
            <h3 class="card-title ps-5 pt-4 pb-2">Score Board</h3>
            <div class="row card-body ps-5 pb-4 pt-2 d-flex">
              <div class="col fs-3">Correct : <strong><?= $correct; ?></strong></div>
              <div class="col fs-3">Wrong : <strong><?= $wrong; ?></strong></div>
              <div class="col fs-3">Total Attempt : <strong><?= $total; ?></strong></div>
            </div>
          </div>
      </div>

  </div>
<!-- display card  -->
<?= $this->endSection()?>