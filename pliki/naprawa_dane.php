<?php
$id_samochod = $_POST['id_samochod'];
$id_mechanik = $_POST['id_mechanik'];
$data = $_POST['data'];
$kwota = $_POST['kwota'];

echo "Samochod: ".$id_samochod."<br/>";
echo "Mechanik: ".$id_mechanik."<br/>";
echo "Data naprawy: ".$data."<br/>";
echo "Kwota: ".$kwota."<br/>";

$query = "INSERT INTO `naprawa`(`id_samochod`, `id_mechanik`, `data_naprawy`, `kwota`) VALUES ('".$id_samochod."', '".$id_mechanik."', '".$data."','".$kwota."')";

if(mysqli_query($connect, $query)){
    echo "Dodano naprawę<br/>";
}
?>