<?php
include 'header.php';

$marka = $_POST['marka'];
$model = $_POST['model'];
$rocznik = $_POST['rocznik'];
$przebieg = $_POST['przebieg'];

echo $marka, $model, $rocznik, $przebieg;

include 'footer.php';
?>