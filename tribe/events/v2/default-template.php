<?php
/**
 * View: Default Template for Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/default-template.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

get_header(); ?>

<?php

$components = get_field('components', 365);
$hero = null;
$fiftyfifty = null;

foreach($components as $c) :

    if($c['acf_fc_layout'] == 'hero') $hero = $c;
    if($c['acf_fc_layout'] == 'rte') $fiftyfifty = $c;

endforeach;

?>

<main id="content">

    <?php 
    $type = $hero['type'];
    $image = $hero['image'];
    $header = $hero['header'];
    $copy = $hero['copy'];

    include(realpath(dirname(__FILE__).'/../../../components/heroes/hero.php'));

    unset($type);
    unset($image);
    unset($header);
    unset($copy);
    ?>

    <?php echo tribe( Template_Bootstrap::class )->get_view_html(); ?>

    <?php 
    $type = $fiftyfifty['type'];
    $mainHeader = $fiftyfifty['main_header'];
    $image = $fiftyfifty['image'];
    $header = $fiftyfifty['header'];
    $copy = $fiftyfifty['copy'];
    $button = $fiftyfifty['button'];
    $text = $button['title'];
    $link = $button['url'];
    $inBox = $fiftyfifty['in_box'];

    include(realpath(dirname(__FILE__).'/../../../components/rtes/rte.php'));

    unset($type);
    unset($mainHeader);
    unset($image);
    unset($header);
    unset($copy);
    unset($button);
    unset($text);
    unset($link);
    unset($inBox);
    ?>
</main>

<?php get_footer();
