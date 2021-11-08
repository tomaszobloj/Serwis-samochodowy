<?php
if(isset($_GET['usun'])){
    $usun = $_GET['usun'];
    $query = "DELETE FROM `naprawa` WHERE `id`=".$usun;
    if(mysqli_query($connect, $query)){
        echo "Usunięto naprawę.";
    }
}

$tabela = "<table><tr><th>Id</th><th>Data naprawy</th><th>Kwota</th><th>Edytuj</th><th>Usuń</th></tr>";
$query = "SELECT * FROM `naprawa`";
$rezultat = mysqli_query($connect, $query);

while ($rekord = mysqli_fetch_assoc($rezultat)){
    $edytuj = "<a href='index.php?modul=naprawa_edytuj&amp;id=".$rekord['id']."' class='dodaj'>Edytuj</a>";
    $usun = "<a href='index.php?modul=naprawa&amp;usun=".$rekord['id']."' class='dodaj'>Usuń</a>";
    $tabela .= "<tr><td>".$rekord['id']."</td><td>".$rekord['data_naprawy']."</td><td>".$rekord['kwota']."</td><td>".$edytuj."</td><td>".$usun."</td></tr>";
}

$tabela .= "</table>";
echo $tabela;
?>

<a href="index.php?modul=naprawa_formularz" class="dodaj">Dodaj naprawę</a>