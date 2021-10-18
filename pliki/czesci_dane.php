<?php
$nazwa = $_POST['nazwa'];
$cena = $_POST['cena'];
$stan = $_POST['stan'];

echo "Nazwa części: ".$nazwa."<br/>";
echo "Cena: ".$cena."<br/>";
echo "Stan magazynowy: ".$stan."<br/>";

$query = "INSERT INTO `czesc`(`nazwa`, `cena`, `stan_magazynowy`) VALUES ('".$nazwa."','".$cena."','".$stan."')";

if(mysqli_query($connect, $query)){
    echo "Dodano część<br/>";
}
?>