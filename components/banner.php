<?php 

$bannerText = get_field('banner_text', 'option'); 

?>

<?php if($bannerText): ?>
    <div class="alert alert-primary" id="promo-banner" role="alert">
        <?php echo $bannerText ?>
    </div>
<?php endif; ?>