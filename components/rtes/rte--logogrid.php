<?php
$header = get_sub_field('header');
$copy = get_sub_field('copy');
$items = get_sub_field('grid_items');
?>

<div id="module-<?php echo $moduleCounter ?>" class="module-wrapper" data-scroll-effect="">
    <div class="rte standard logo-grid module-padded">
        
        <div class="inset">
            <?php if($header): ?>
                <h2><?php echo $header ?></h2>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="logo-grid-wrapper">
                    <?php if($copy) echo '<div class="copy">' . $copy . '</div>'; ?>
                    
                    <?php 
                    if(count($items)) : 
                        echo '<div class="row">';
                        foreach($items as $item) :
                            $icon = $item['image'];
                            $text = $item['text']; ?>

                            <div class="card-container col-6 col-md-4 col-lg-3">
                                <?php include (realpath(dirname(__FILE__)."/../cards/card--icon-text.php")); ?>
                            </div>

                    <?php endforeach; echo '</div>'; endif; ?>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php
unset($header);
unset($copy);
unset($items);
?>