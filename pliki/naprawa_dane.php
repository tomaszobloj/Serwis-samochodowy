<?php
$data = $_POST['data'];
$kwota = $_POST['kwota'];

echo "Data naprawy: ".$data."<br/>";
echo "Kwota: ".$kwota."<br/>";

$query = "INSERT INTO `naprawa`(`data_naprawy`, `kwota`) VALUES ('".$data."','".$kwota."')";

if(mysqli_query($connect, $query)){
    echo "Dodano naprawę<br/>";
}
?>