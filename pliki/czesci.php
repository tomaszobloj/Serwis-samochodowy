<?php
$tabela = "<table><tr><th>Id</th><th>Nazwa</th><th>Cena</th><th>Stan</th></tr>";
$query = "SELECT * FROM `czesc`";
$rezultat = mysqli_query($connect, $query);

while ($rekord = mysqli_fetch_assoc($rezultat)){
    $tabela .= "<tr><td>".$rekord['id']."</td><td>".$rekord['nazwa']."</td><td>".$rekord['cena']."</td><td>".$rekord['stan_magazynowy']."</td></tr>";
}

$tabela .= "</table>";
echo $tabela;
?>

<a href="index.php?modul=czesci_formularz" class="dodaj">Dodaj części</a>