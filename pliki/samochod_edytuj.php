<?php
if(isset($_GET['aktualizuj'])){
    $id_klient = $_POST['id_klient'];
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $rocznik = $_POST['rocznik'];
    $przebieg = $_POST['przebieg'];
    $aktualizuj = $_GET['aktualizuj'];

    echo "Zmienione dane samochodu: <br/>";
    echo "Klient: ".$id_klient."<br/>";
    echo "Marka samochodu: ".$marka."<br/>";
    echo "Model: ".$model."<br/>";
    echo "Rocznik: ".$rocznik."<br/>";
    echo "Przebieg: ".$przebieg."<br/>";

    $query = "UPDATE `samochod` SET `id`='".$aktualizuj."', `id_kient`='".$id_klient."', `marka`='".$marka."', `model`='".$model."', `rocznik`='".$rocznik."', `przebieg`='".$przebieg."' WHERE `id`=".$aktualizuj;

    if(mysqli_query($connect, $query)){
        echo "Baza została zaaktualizowana!";
    } else {
        echo "Błąd! Prosimy o kontakt z administracją!";
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM `samochod` WHERE `id`=$id";
    $rezultat = mysqli_query($connect, $query);
    $rekord = mysqli_fetch_assoc($rezultat);
?>

<form action="index.php?modul=samochod_edytuj&amp;aktualizuj=<?php echo $rekord['id'];?>" method="POST">
  <fieldset>
    <legend>Dane samochodu:</legend>
      <label for="id_klient">Klient:</label><br>
      <?php
        function edytujKlienta($dane, $name){
          echo "<select name='".$name."'>";
          while($rekord = mysqli_fetch_assoc($dane)){
            echo "<option value='".$rekord['id']."'>".$rekord['nazwisko']."</option>";
          }
        echo "</select><br>";
        }
        
        $query = "SELECT * FROM `klient`";
        $rezultat = mysqli_query($connect, $query);
        
        edytujKlienta($rezultat, "id_klient");
      ?>
      <label for="marka">Marka:</label>
      <input type="text" name="marka" value="<?php echo $rekord['marka'];?>"><br/>
      <label>Model:</label>
      <input type="text" name="model" value="<?php echo $rekord['model'];?>"><br/>
      <label>Rocznik:</label>
      <input type="number" name="rocznik" value="<?php echo $rekord['rocznik'];?>"><br/>
      <label>Przebieg:</label>
      <input type="number" name="przebieg" value="<?php echo $rekord['przebieg'];?>"><br/>
      <input type="hidden" name="aktualizuj" value="<?php echo $rekord['id'];?>">
      <input type="submit" value="Wyślij">
  </fieldset>
</form>

<?php
}
?>