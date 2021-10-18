<?php
include 'header.php';

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$telefon = $_POST['telefon'];
$adres = $_POST['adres'];

echo $imie, $nazwisko, $telefon, $adres;

include 'footer.php';
?>