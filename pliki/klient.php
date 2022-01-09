<?php
/*
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
echo $tabela;*/
if(isset($_GET['usun'])){
    $usun = $_GET['usun'];
    $query = "DELETE FROM `klient` WHERE `id`=".$usun;
    if(mysqli_query($connect, $query)){
        echo "Usunięto klienta.";
    }
}

$wyszukajImie = '';
$wyszukajNazwisko = '';
$wyszukajTelefon = '';
$wyszukajAdres = '';
$tabela = "<table><tr><th>Id</th><th>Imie</th><th>Nazwisko</th><th>Telefon</th><th>Adres</th></tr>";
$tabela .= '<tr><td>Wyszukaj</td><td><form action="" method="post"><input type="text" name="imie" value="'.$wyszukajImie.'"></td><td><input type="text" name="nazwisko" value="'.$wyszukajNazwisko.'"></td><td><input type="number" name="telefon" value="'.$wyszukajTelefon.'"></td><td><input type="text" name="adres" value="'.$wyszukajAdres.'"></td><td colspan="2"><input type="submit" value="Szukaj"></td></tr>';
$query = "SELECT * FROM `klient` WHERE 1=1";

if(isset($_POST['imie'])){
	$query .= ' AND imie LIKE "%'.$_POST['imie'].'%"';
	$wyszukajImie = $_POST['imie'];
}

if(isset($_POST['nazwisko'])){
	$query .= ' AND nazwisko LIKE "%'.$_POST['nazwisko'].'%"';
	$wyszukajNazwisko = $_POST['nazwisko'];
}

if(isset($_POST['telefon'])){
	$query .= ' AND telefon LIKE "%'.$_POST['telefon'].'%"';
	$wyszukajTelefon = $_POST['telefon'];
}

if(isset($_POST['adres'])){
	$query .= ' AND adres LIKE "%'.$_POST['adres'].'%"';
	$wyszukajAdres = $_POST['adres'];
}

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