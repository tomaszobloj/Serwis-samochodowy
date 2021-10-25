<?php
$tabela = "<table><tr><th>Id</th><th>Imie</th><th>Nazwisko</th><th>Telefon</th><th>Adres</th></tr>";
$query = "SELECT * FROM `klient`";
$rezultat = mysqli_query($connect, $query);

while ($rekord = mysqli_fetch_assoc($rezultat)){
    $tabela .= "<tr><td>".$rekord['id']."</td><td>".$rekord['imie']."</td><td>".$rekord['nazwisko']."</td><td>".$rekord['telefon']."</td><td>".$rekord['adres']."</td></tr>";
}

$tabela .= "</table>";
echo $tabela;
?>

<a href="index.php?modul=klient_formularz" class="dodaj">Dodaj klienta</a>