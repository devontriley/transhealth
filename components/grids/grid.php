<?php
$type = get_sub_field('type');

if($type == 'events') include 'grid--events.php';
if($type == 'staff') include 'grid--staff.php';
if($type == 'services') include 'grid--services.php';

unset($type);
?>