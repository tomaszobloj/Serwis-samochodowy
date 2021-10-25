<?php
$tabela = "<table><tr><th>Id</th><th>Marka</th><th>Model</th><th>Rocznik</th><th>Przebieg</th></tr>";
$query = "SELECT * FROM `samochod`";
$rezultat = mysqli_query($connect, $query);

while ($rekord = mysqli_fetch_assoc($rezultat)){
    $tabela .= "<tr><td>".$rekord['id']."</td><td>".$rekord['marka']."</td><td>".$rekord['model']."</td><td>".$rekord['rocznik']."</td><td>".$rekord['przebieg']."</td></tr>";
}

$tabela .= "</table>";
echo $tabela;
?>

<a href="index.php?modul=samochod_formularz" class="dodaj">Dodaj samochód</a>