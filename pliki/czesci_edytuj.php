<?php
if(isset($_GET['aktualizuj'])){
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $stan = $_POST['stan'];
    $aktualizuj = $_GET['aktualizuj'];

    echo "Zmienione dane części: <br/>";
    echo "Nazwa części: ".$nazwa."<br/>";
    echo "Cena: ".$cena."<br/>";
    echo "Stan magazynowy: ".$stan."<br/>";

    $query = "UPDATE `czesc` SET `id`='".$aktualizuj."', `nazwa`='".$nazwa."', `cena`='".$cena."', `stan_magazynowy`='".$stan."' WHERE `id`=".$aktualizuj;

    if(mysqli_query($connect, $query)){
        echo "Baza została zaaktualizowana!";
    } else {
        echo "Błąd! Prosimy o kontakt z administracją!";
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM `czesc` WHERE `id`=$id";
    $rezultat = mysqli_query($connect, $query);
    $rekord = mysqli_fetch_assoc($rezultat);
?>

<form action="index.php?modul=czesci_edytuj&amp;aktualizuj=<?php echo $rekord['id'];?>" method="POST">
  <fieldset>
    <legend>Dane części:</legend>
    <label for="nazwa">Nazwa:</label>
    <input type="text" name="nazwa" value="<?php echo $rekord['nazwa'];?>"><br>
    <label>Cena:</label>
    <input type="number" step="0.01" name="cena" value="<?php echo $rekord['cena'];?>"><br>
    <label>Stan magazynowy:</label>
    <input type="number" name="stan" value="<?php echo $rekord['stan_magazynowy'];?>"><br>
    <input type="hidden" name="aktualizuj" value="<?php echo $rekord['id'];?>">
    <input type="submit" value="Wyślij">
  </fieldset>
</form>

<?php
}
?>