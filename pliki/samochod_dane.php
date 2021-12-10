<?php
$id_klient = $_POST['id_klient'];
$marka = $_POST['marka'];
$model = $_POST['model'];
$rocznik = $_POST['rocznik'];
$przebieg = $_POST['przebieg'];

echo "Klient :".$id_klient."<br/>";
echo "Marka samochodu: ".$marka."<br/>";
echo "Model: ".$model."<br/>";
echo "Rocznik: ".$rocznik."<br/>";
echo "Przebieg: ".$przebieg."<br/>";

$query = "INSERT INTO `samochod`(`id_kient`, `marka`, `model`, `rocznik`, `przebieg`) VALUES ('".$id_klient."', '".$marka."','".$model."','".$rocznik."','".$przebieg."')";

if(mysqli_query($connect, $query)){
    echo "Dodano samochód<br/>";
}
?>