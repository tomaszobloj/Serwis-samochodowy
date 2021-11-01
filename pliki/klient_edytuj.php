<?php
if(isset($_GET['aktualizuj'])){
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $telefon = $_POST['telefon'];
    $adres = $_POST['adres'];
    $aktualizuj = $_GET['aktualizuj'];

    echo "Zmienione dane klienta: <br/>";
    echo "Imię: ".$imie."<br/>";
    echo "Nazwisko: ".$nazwisko."<br/>";
    echo "Telefon: ".$telefon."<br/>";
    echo "Adres: ".$adres."<br/>";

    $query = "UPDATE `klient` SET `id`='".$aktualizuj."', `imie`='".$imie."',`nazwisko`='".$nazwisko."',`telefon`='".$telefon."',`adres`='".$adres."' WHERE `id`=".$aktualizuj; 
    
    if(mysqli_query($connect, $query)){
        echo "Baza została zaaktualizowana!";
    } else {
        echo "Błąd! Prosimy o kontakt z administracją!";
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM `klient` WHERE `id`=$id";
    $rezultat = mysqli_query($connect, $query);
    $rekord = mysqli_fetch_assoc($rezultat);
?>

<form action="index.php?modul=klient_edytuj&amp;aktualizuj=<?php echo $rekord['id'];?>" method="post">
    <fieldset>
        <legend>Edytuj dane klienta:</legend>
        <label for="imie">Imię:</label>
        <input type="text" name="imie" value="<?php echo $rekord['imie'];?>"><br>
        <label>Nazwisko:</label>
        <input type="text" name="nazwisko" value="<?php echo $rekord['nazwisko'];?>"><br>
        <label>Telefon:</label>
        <input type="number" name="telefon" value="<?php echo $rekord['telefon'];?>"><br>
        <label>Adres:</label>
        <input type="text" name="adres" value="<?php echo $rekord['adres'];?>"><br>
        <input type="hidden" name="aktualizuj" value="<?php echo $rekord['id'];?>">
        <input type="submit" value="Wyślij">
    </fieldset>
</form>

<?php
}
?>
