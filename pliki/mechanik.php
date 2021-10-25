<?php
$tabela = "<table><tr><th>Id</th><th>Imie</th><th>Nazwisko</th><th>Telefon</th></tr>";
$query = "SELECT * FROM `mechanik`";
$rezultat = mysqli_query($connect, $query);

while ($rekord = mysqli_fetch_assoc($rezultat)){
    $tabela .= "<tr><td>".$rekord['id']."</td><td>".$rekord['imie']."</td><td>".$rekord['nazwisko']."</td><td>".$rekord['telefon']."</td></tr>";
}

$tabela .= "</table>";
echo $tabela;
?>

<a href="index.php?modul=mechanik_formularz" class="dodaj">Dodaj mechanika</a>