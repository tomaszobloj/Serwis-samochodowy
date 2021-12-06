<?php
if(isset($_GET['aktualizuj'])){
    $data = $_POST['data'];
    $kwota = $_POST['kwota'];
    $aktualizuj = $_GET['aktualizuj'];

    echo "Zmienione dane naprawy: <br/>";
    echo "Data naprawy: ".$data."<br/>";
    echo "Kwota: ".$kwota."<br/>";

    $query = "UPDATE `naprawa` SET `id`='".$aktualizuj."', `data_naprawy`='".$data."', `kwota`='".$kwota."' WHERE `id`=".$aktualizuj;

    if(mysqli_query($connect, $query)){
        echo "Baza została zaaktualizowana!";
    } else {
        echo "Błąd! Prosimy o kontakt z administracją!";
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM `naprawa` WHERE `id`=$id";
    $rezultat = mysqli_query($connect, $query);
    $rekord = mysqli_fetch_assoc($rezultat);
?>

<form action="index.php?modul=naprawa_edytuj&amp;aktualizuj=<?php echo $rekord['id'];?>" method="POST">
  <fieldset>
    <legend>Dane naprawy:</legend>
    <label for="data">Data naprawy:</label>
    <input type="date" name="data" value="<?php echo $rekord['data_naprawy'];?>"><br/>
    <label>Kwota:</label>
    <input type="number" name="kwota" value="<?php echo $rekord['kwota'];?>"><br/>
    <input type="hidden" name="aktualizuj" value="<?php echo $rekord['id'];?>">
    <input type="submit" value="Wyślij">
  </fieldset>
</form>

<?php
}
?>