<?php //print_r($graphic); ?>

<div class="card service" data-scroll-effect="">
    <div class="card-body d-flex">
        <div class="row d-flex">
            <div class="col-lg-5 align-self-center img-container">
                <div class="img-wrapper text-center">
                    <?php echo imageTag($graphic, 'img'); ?>
                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-center text-container" style="background-color: <?php echo $bgColor ?>;">
                <div class="text-wrapper" style="color: <?php echo $textColor ?>;">
                    <h2 class="title"><?php echo $title ?></h5>
                    <p class="card-text"><?php echo $copy ?></p>
                </div>
            </div>
        </div>    
    </div>
</div>