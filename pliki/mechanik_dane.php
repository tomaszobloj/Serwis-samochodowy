<?php
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$telefon = $_POST['telefon'];

echo "Imię: ".$imie."<br/>";
echo "Nazwisko: ".$nazwisko."<br/>";
echo "Telefon: ".$telefon."<br/>";

$query = "INSERT INTO `mechanik`(`imie`, `nazwisko`, `telefon`) VALUES ('".$imie."','".$nazwisko."','".$telefon."')";

if(mysqli_query($connect, $query)){
    echo "Dodano mechanika<br/>";
}
?>