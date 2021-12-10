<?php
$id_samochod = $_POST['id_samochod'];
$data = $_POST['data'];
$kwota = $_POST['kwota'];

echo "Data naprawy: ".$data."<br/>";
echo "Kwota: ".$kwota."<br/>";

$query = "INSERT INTO `naprawa`(`id_samochod` ,`data_naprawy`, `kwota`) VALUES ('".$id_samochod."', '".$data."','".$kwota."')";

if(mysqli_query($connect, $query)){
    echo "Dodano naprawę<br/>";
}
?>