<?php
if(!$header) $header = get_sub_field('header');
if(!$faqs) $faqs = get_sub_field('section');
?>

<div class="module-wrapper faq">
    <div class="module-padded faq" id="accordion">
        <div class="row">

            <div class="col-lg-3 offset-lg-1">
                <h1><?php echo $header ?></h1>
            </div>

            <div class="col-lg-7 offset-lg-1">
                <?php
                $counter = 1;
                foreach($faqs as $f) :
                    $title = $f['title'];
                    $faq = $f['faq'];
                ?>

                <h2><?php echo $title ?></h2>

                <?php
                foreach($faq as $ff) :
                    $q = $ff['question'];
                    $a = $ff['answer'];
                ?>

                <div class="card">
                    <div class="inner">
                        <div class="card-header" id="heading-<?php echo $counter ?>">
                            <p class="mb-0">
                                <button class="question question-button collapsed" data-toggle="collapse" data-target="#collapse-<?php echo $counter ?>" aria-expanded="false" aria-controls="collapse-<?php echo $counter ?>">
                                    <svg width="10.86px" height="16.8px" iewBox="0 0 10.86 16.8">
                                        <use href="#right-arrow" />
                                    </svg>
                                    <?php echo $q ?>
                                </button>
                            </p>
                        </div>

                        <div id="collapse-<?php echo $counter ?>" class="card-body collapse" aria-labelledby="heading-<?php echo $counter ?>" data-parent="#accordion">
                            <div class="inner">
                                <p class="copy"><?php echo $a ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $counter++;
                endforeach;
                endforeach;
                ?>
            </div>

        </div>
    </div>
</div>