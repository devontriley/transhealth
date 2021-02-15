<?php
if(!$type) $type = get_sub_field('type');

if($type == 'primary') include 'hero--primary.php';
if($type == 'secondary') include 'hero--secondary.php';

unset($type);
?>