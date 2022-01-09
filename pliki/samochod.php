<?php
if(isset($_GET['usun'])){
    $usun = $_GET['usun'];
    $query = "DELETE FROM `samochod` WHERE `id`=".$usun;
    if(mysqli_query($connect, $query)){
        echo "Usunięto samochod.";
    }
}

$wyszukajMarka = '';
$wyszukajModel = '';
$wyszukajRocznik = '';
$wyszukajPrzebieg = '';
$tabela = "<table><tr><th>Id</th><th>Marka</th><th>Model</th><th>Rocznik</th><th>Przebieg</th></tr>";
$tabela .= '<tr><td>Wyszukaj</td><td><form action="" method="post"><input type="text" name="marka" value="'.$wyszukajMarka.'"></td><td><input type="text" name="model" value="'.$wyszukajModel.'"></td><td><input type="text" name="rocznik" value="'.$wyszukajRocznik.'"></td><td><input type="text" name="przebieg" value="'.$wyszukajPrzebieg.'"></td><td colspan="2"><input type="submit" value="Szukaj"></td></tr>';
$query = "SELECT * FROM `samochod` WHERE 1=1";

if(isset($_POST['marka'])){
	$query .= ' AND marka LIKE "%'.$_POST['marka'].'%"';
	$wyszukajMarka = $_POST['marka'];
}

if(isset($_POST['model'])){
	$query .= ' AND model LIKE "%'.$_POST['model'].'%"';
	$wyszukajModel = $_POST['model'];
}

if(isset($_POST['rocznik'])){
	$query .= ' AND rocznik LIKE "%'.$_POST['rocznik'].'%"';
	$wyszukajRocznik = $_POST['rocznik'];
}

if(isset($_POST['przebieg'])){
	$query .= ' AND przebieg LIKE "%'.$_POST['przebieg'].'%"';
	$wyszukajPrzebieg = $_POST['przebieg'];
}

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