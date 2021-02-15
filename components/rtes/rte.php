<?php
if(!$type) $type = get_sub_field('type');

if($type == 'standard') include 'rte--standard.php';
if($type == 'text-icon-grid') include 'rte--standard.php';
if($type == 'logo-grid') include 'rte--logogrid.php';
if($type == 'fiftyfifty') include 'rte--fiftyfifty.php';

unset($type);
?>