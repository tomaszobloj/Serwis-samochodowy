<?php
$marka = $_POST['marka'];
$model = $_POST['model'];
$rocznik = $_POST['rocznik'];
$przebieg = $_POST['przebieg'];

echo "Marka samochodu: ".$marka."<br/>";
echo "Model: ".$model."<br/>";
echo "Rocznik: ".$rocznik."<br/>";
echo "Przebieg: ".$przebieg."<br/>";

$query = "INSERT INTO `samochod`(`marka`, `model`, `rocznik`, `przebieg`) VALUES ('".$marka."','".$model."','".$rocznik."','".$przebieg."')";

if(mysqli_query($connect, $query)){
    echo "Dodano samochód<br/>";
}
?>