<?php
if(isset($_GET['usun'])){
    $usun = $_GET['usun'];
    $query = "DELETE FROM `klient` WHERE `id`=".$usun;
    if(mysqli_query($connect, $query)){
        echo "Usunięto klienta.";
    }
}

$tabela = "<table><tr><th>Id</th><th>Imie</th><th>Nazwisko</th><th>Telefon</th><th>Adres</th><th>Edytuj</th><th>Usuń</th></tr>";
$query = "SELECT * FROM `klient`";
$rezultat = mysqli_query($connect, $query);

while ($rekord = mysqli_fetch_assoc($rezultat)){
    $edytuj = "<a href='index.php?modul=klient_edytuj&amp;id=".$rekord['id']."' class='dodaj'>Edytuj</a>";
    $usun = "<a href='index.php?modul=klient&amp;usun=".$rekord['id']."' class='dodaj'>Usuń</a>";
    $tabela .= "<tr><td>".$rekord['id']."</td><td>".$rekord['imie']."</td><td>".$rekord['nazwisko']."</td><td>".$rekord['telefon']."</td><td>".$rekord['adres']."</td><td>".$edytuj."</td><td>".$usun."</td></tr>";
}

$tabela .= "</table>";
echo $tabela;
?>

<a href="index.php?modul=klient_formularz" class="dodaj">Dodaj klienta</a>