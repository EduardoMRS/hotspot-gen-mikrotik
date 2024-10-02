<?php
$directory = '../ads/';
$videos = array_diff(scandir($directory), array('..', '.'));

echo json_encode(array_values($videos));
?>
