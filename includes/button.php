<?php

function button($link = null, $text = null, $class = null, $target = null) {
    if(!$link) $link = get_sub_field('link');
    if(!$text) $text = get_sub_field('text');

    return '<a target="'. $target .'" class="btn '. $class .'" role="button" href="'. $link .'"><span>' . $text . '</span></a>';
}