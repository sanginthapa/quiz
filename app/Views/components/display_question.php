<!-- layout container  -->
<div>
    <h1>Welcome to Quiz <?= (isset($user)?$user:"no user") ?>!</h1>
    <!-- top bar section-->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-6 justify-content-between bg-light">
        <div class="col text-start">Quizzes</div>
        <div class="col">
            <div class="progress" style="height: 4px;margin-top:13px;">
                <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="col text-center">Question <strong>1</strong> of 15 </div>
        <div class="col text-end"><a type="button" class="btn-close" disabled aria-label="Close"></a>
        <!-- close --></div>
    </div>
    <!-- top bar section-->
    <!-- question section -->
    <div class="d-flex justify-content-between ">
        <div class="col-1 position-relative">
            <div class="position-absolute top-50 start-0 translate-middle-y heading">
                <a href="#" class="prev text-decoration-none text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                </a>
            </div>
        </div>
        <div class="col-10 py-2">
            <div class="col-12">
                <div class="col-12 p-4 d-flex justify-content-between">
                    <div class="col-10 h4 text-center letter-specing-2">Q. <?= $question ?>?  </div>
                    <div class="col-2 text-end">Time Left : <strong id="timeout">20</strong></div>
                </div>
                <!-- <div class="col-12 text-center">
                    <img src="/assets/images/team.jpg" alt="" style="height:auto;width:250px" >
                </div> -->
                <div class="col-8 container m-auto">
                    <div class="container d-flex justify-content-between py-3 row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-6">
                        <?php foreach($option as $optn):?>
                            <div class="col py-2">
                            <input type="radio" class="btn-check" name="options" data-optn_id="<?= $optn->option_id; ?>" id="<?= $optn->option_name; ?>" autocomplete="off">
                            <label class="btn w-100 btn-outline-primary" for="<?= $optn->option_name; ?>"><?= $optn->option_name; ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1 position-relative">
            <div class="position-absolute top-50 end-0 translate-middle-y">
                <a href="#" class="next text-decoration-none text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 text-center mb-5"><button style="background: #0f4ebf;border-radius: 4px;border: 1px;color:white;padding: 10px 40px;">Next</button></div>
    <!-- question section -->
</div>
<!-- layout container  -->

