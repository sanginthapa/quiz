<?php 

?>
<!-- layout container  -->
<div>
    <h5 class="text-center my-5">Welcome to Quiz <?= (isset($active_email)?$active_email:"no user") ?>!</h5>
    <!-- top bar section-->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-6 justify-content-between bg-light">
        <div class="col text-start">Quizzes</div>
        <div class="col">
            <div class="progress" style="height: 4px;margin-top:13px;">
                <div class="progress-bar" role="progressbar" style="width:<?= $percentage ?>%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="col text-center">Question <strong><?= ($counter==100?$counter/10:$counter) ?></strong> of <?= $total;?> </div>
        <div class="col text-end"><a type="button" data-base_url="<?= base_url('/home') ?>" class="btn-close exit_quize" id="exit_quize" disabled aria-label="Close"></a>
        <!-- close --></div>
    </div>
    <!-- top bar section-->
    <!-- question section -->
    <div class="d-flex justify-content-between ">
        <div class="col-1 position-relative">
            <div class="position-absolute top-50 start-0 translate-middle-y heading">
                <?php $left='<a href="#" class="prev text-decoration-none text-dark display-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                </a>'; ?>
            </div>
        </div>
        <div class="col-10 py-2">
            <!-- Quiz form  -->
            <form method="post" action="<?= (isset($nextQtn)?$nextQtn:'SA1'); ?>">
                <div class="col-12">
                    <div class="col-12 p-4 d-flex justify-content-between">
                        <input type="hidden" name="question_id" value="<?= $question_id; ?>">
                        <div class="col-10 h4 text-center letter-specing-2">Q. <?= $question; ?>?  </div>
                        <div class="col-2 text-end">Time Left : <strong id="timeout">15</strong></div>
                    </div>
                    <!-- <div class="col-12 text-center">
                        <img src="/assets/images/team.jpg" alt="" style="height:auto;width:250px" >
                    </div> -->
                    <div class="col-auto container m-auto">
                        <div class="container d-flex justify-content-between py-3 row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-6">
                            <?php foreach($option as $optn):?>
                                <div class="col py-2">
                                <input class="select_option" type="radio" class="btn-check" name="options" data-optn_id="<?= $optn->option_id; ?>" id="<?= $optn->option_name; ?>" autocomplete="off">
                                <label class="btn w-100 btn-outline-primary" for="<?= $optn->option_name; ?>"><?= $optn->option_name; ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1 position-relative">
                <div class="position-absolute top-50 end-0 translate-middle-y">
                    <input type="hidden" name="option_id" id="option_id">
                    </php $right='<a href="#" class="next text-decoration-none text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </a>' ?>
                </div>
            </div>
        </div>
        <?php if($counter<$total){ ?>
        <div class="col-12 text-center mb-5"><button id="submmitAns" class="btn" style="background: #0f4ebf;border-radius: 4px;border: 1px;color:white;padding: 10px 40px;">Next</button></div>
        <?php } 
        else if($counter>=$total){ ?>
        <div class="col-12 text-center mb-5"><button id="submmitAns" class="btn" style="background:green;border-radius: 4px;border: 1px;color:white;padding: 10px 40px;">Submit</button></div>
        <?php }
        ?>
        <?php 
        if(isset($error_msg)){
        ?>
        <div class="col-12 text-danger m-auto fs-3 text-center mb-5"><?= $error_msg ?></div>
        <?php }?>
    </form>
    <!-- Quiz form  -->
        <!-- question section -->
    </div>
<!-- layout container  -->

<!-- on page script  -->
<script>
    $(document).ready(function () {
  //exit quize
  $("#exit_quize#exit_quize").on("click", function () {
    if (confirm("Are you sure you want to Quit??")) {
      //redirect to home page
      var link = $(this).attr("data-base_url");
      // alert(link);
      window.location.href = link;
    }
  });
  //for selection quize option
  $(".select_option").on("click", function () {
    var optn_val = $(this).attr("data-optn_id");
    $("#option_id").val(optn_val);
  });

  $(".select_option:first").attr("required", "required");
  //timer section
  var count = 16;
  var interval = setInterval(function () {
    count--;
    if (count <= 5) {
      $("#timeout").css("border-color", "red");
      $("#timeout").css("background", "#dc353547");
    } else if (count > 5 && count < 10) {
      $("#timeout").css("border-color", "#e7bc00");
      $("#timeout").css("background", "#e7bc0038");
    } else if (count > 10) {
      $("#timeout").css("border-color", "green");
      $("#timeout").css("background", "#02d07154");
    }
    $("#timeout").text(count);
    if (count == 0) {
  $(".select_option").removeAttr("required", "required");
  $("#timeout").addClass("text-danger");
  $("#timeout").parent().addClass('showMsg');
  $(".showMsg").empty();
  $(".showMsg").addClass("text-danger");
  $(".showMsg").attr("id","timeout");
  $(".showMsg").text("Time Out");
    $("#option_id").val(0);
      clearInterval(interval); //uncomment to stop timer
      if(confirm("Time Out, Do you want to continue to next question or exit ?")){
        $("#submmitAns").click();
      }else{
        var link = $("#exit_quize").attr("data-base_url");
        // alert(link);
        window.location.href =link;
      }
    }
  }, 1000);
});
</script>
<!-- on page script  -->