<?php

function button($link = null, $text = null, $class = null) {
    if(!$link) $link = get_sub_field('link');
    if(!$text) $text = get_sub_field('text');

    return '<a class="btn '. $class .'" role="button" href="'. $link .'"><span>' . $text . '</span></a>';
}