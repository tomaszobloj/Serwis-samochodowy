<?php
$tabela = "<table><tr><th>Id</th><th>Data naprawy</th><th>Kwota</th></tr>";
$query = "SELECT * FROM `naprawa`";
$rezultat = mysqli_query($connect, $query);

while ($rekord = mysqli_fetch_assoc($rezultat)){
    $tabela .= "<tr><td>".$rekord['id']."</td><td>".$rekord['data_naprawy']."</td><td>".$rekord['kwota']."</td></tr>";
}

$tabela .= "</table>";
echo $tabela;
?>

<a href="index.php?modul=naprawa_formularz" class="dodaj">Dodaj naprawę</a>