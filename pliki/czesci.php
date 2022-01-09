<?php
if(isset($_GET['usun'])){
    $usun = $_GET['usun'];
    $query = "DELETE FROM `czesc` WHERE `id`=".$usun;
    if(mysqli_query($connect, $query)){
        echo "Usunięto część.";
    }
}

$wyszukajNazwa = '';
$wyszukajCena = '';
$wyszukajStan = '';
$tabela = "<table><tr><th>Id</th><th>Nazwa</th><th>Cena</th><th>Stan</th></tr>";
$tabela .= '<tr><td>Wyszukaj</td><td><form action="" method="post"><input type="text" name="nazwa" value="'.$wyszukajNazwa.'"></td><td><input type="number" name="cena" value="'.$wyszukajCena.'"></td><td><input type="number" name="stan_magazynowy" value="'.$wyszukajStan.'"></td><td colspan="2"><input type="submit" value="Szukaj"></td></tr>';
$query = "SELECT * FROM `czesc` WHERE 1=1";

if(isset($_POST['nazwa'])){
	$query .= ' AND nazwa LIKE "%'.$_POST['nazwa'].'%"';
	$wyszukajNazwa = $_POST['nazwa'];
}

if(isset($_POST['cena'])){
	$query .= ' AND cena LIKE "%'.$_POST['cena'].'%"';
	$wyszukajCena = $_POST['cena'];
}

if(isset($_POST['stan_magazynowy'])){
	$query .= ' AND stan_magazynowy LIKE "%'.$_POST['stan_magazynowy'].'%"';
	$wyszukajStan = $_POST['stan_magazynowy'];
}

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