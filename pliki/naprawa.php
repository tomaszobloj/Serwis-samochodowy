<?php
if(isset($_GET['usun'])){
    $usun = $_GET['usun'];
    $query = "DELETE FROM `naprawa` WHERE `id`=".$usun;
    if(mysqli_query($connect, $query)){
        echo "Usunięto naprawę.";
    }
}

$wyszukajDataNaprawy = '';
$wyszukajKwota = '';
$tabela = "<table><tr><th>Id</th><th>Data naprawy</th><th>Kwota</th></tr>";
$tabela .= '<tr><td>Wyszukaj</td><td><form action="" method="post"><input type="date" name="data_naprawy" value="'.$wyszukajDataNaprawy.'"></td><td><input type="text" name="kwota" value="'.$wyszukajKwota.'"></td><td colspan="2"><input type="submit" value="Szukaj"></td></tr>';
$query = "SELECT * FROM `naprawa` WHERE 1=1";

if(isset($_POST['data_naprawy'])){
	$query .= ' AND data_naprawy LIKE "%'.$_POST['data_naprawy'].'%"';
	$wyszukajDataNaprawy = $_POST['data_naprawy'];
}

if(isset($_POST['kwota'])){
	$query .= ' AND kwota LIKE "%'.$_POST['kwota'].'%"';
	$wyszukajKwota = $_POST['kwota'];
}

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