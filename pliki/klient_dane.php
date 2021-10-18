<?php
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$telefon = $_POST['telefon'];
$adres = $_POST['adres'];

echo "Imię: ".$imie."<br/>";
echo "Nazwisko: ".$nazwisko."<br/>";
echo "Telefon: ".$telefon."<br/>";
echo "Adres: ".$adres."<br/>";

$query = "INSERT INTO `klient`(`imie`, `nazwisko`, `telefon`, `adres`) VALUES ('".$imie."','".$nazwisko."','".$telefon."','".$adres."')";

if(mysqli_query($connect, $query)){
    echo "Dodano klienta<br/>";
}
?>