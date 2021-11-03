<?php
if(isset($_GET['usun'])){
    $usun = $_GET['usun'];
    $query = "DELETE FROM `czesc` WHERE `id`=".$usun;
    if(mysqli_query($connect, $query)){
        echo "Usunięto część.";
    }
}

$tabela = "<table><tr><th>Id</th><th>Nazwa</th><th>Cena</th><th>Stan</th><th>Edytuj</th><th>Usuń</th></tr>";
$query = "SELECT * FROM `czesc`";
$rezultat = mysqli_query($connect, $query);

while ($rekord = mysqli_fetch_assoc($rezultat)){
    $edytuj = "<a href='index.php?modul=czesci_edytuj&amp;id=".$rekord['id']."' class='dodaj'>Edytuj</a>";
    $usun = "<a href='index.php?modul=czesci&amp;usun=".$rekord['id']."' class='dodaj'>Usuń</a>";
    $tabela .= "<tr><td>".$rekord['id']."</td><td>".$rekord['nazwa']."</td><td>".$rekord['cena']."</td><td>".$rekord['stan_magazynowy']."</td><td>".$edytuj."</td><td>".$usun."</td></tr>";
}

$tabela .= "</table>";
echo $tabela;
?>

<a href="index.php?modul=czesci_formularz" class="dodaj">Dodaj części</a>