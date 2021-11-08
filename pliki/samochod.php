<?php
if(isset($_GET['usun'])){
    $usun = $_GET['usun'];
    $query = "DELETE FROM `samochod` WHERE `id`=".$usun;
    if(mysqli_query($connect, $query)){
        echo "Usunięto samochod.";
    }
}

$tabela = "<table><tr><th>Id</th><th>Marka</th><th>Model</th><th>Rocznik</th><th>Przebieg</th><th>Edytuj</th><th>Usuń</th></tr>";
$query = "SELECT * FROM `samochod`";
$rezultat = mysqli_query($connect, $query);

while ($rekord = mysqli_fetch_assoc($rezultat)){
    $edytuj = "<a href='index.php?modul=samochod_edytuj&amp;id=".$rekord['id']."' class='dodaj'>Edytuj</a>";
    $usun = "<a href='index.php?modul=samochod&amp;usun=".$rekord['id']."' class='dodaj'>Usuń</a>";
    $tabela .= "<tr><td>".$rekord['id']."</td><td>".$rekord['marka']."</td><td>".$rekord['model']."</td><td>".$rekord['rocznik']."</td><td>".$rekord['przebieg']."</td><td>".$edytuj."</td><td>".$usun."</td></tr>";
}

$tabela .= "</table>";
echo $tabela;
?>

<a href="index.php?modul=samochod_formularz" class="dodaj">Dodaj samochód</a>