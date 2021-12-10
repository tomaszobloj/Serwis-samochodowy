<?php
if(isset($_GET['aktualizuj'])){
    $id_samochod = $_POST['id_samochod'];
    $id_mechanik = $_POST['id_mechanik'];
    $data = $_POST['data'];
    $kwota = $_POST['kwota'];
    $aktualizuj = $_GET['aktualizuj'];

    echo "Zmienione dane naprawy: <br/>";
    echo "Samochód: ".$id_samochod."<br/>";
    echo "Mechanik: ".$id_mechanik."<br/>";
    echo "Data naprawy: ".$data."<br/>";
    echo "Kwota: ".$kwota."<br/>";

    $query = "UPDATE `naprawa` SET `id`='".$aktualizuj."', `id_samochod`='".$id_samochod."', `id_mechanik`='".$id_mechanik."', `data_naprawy`='".$data."', `kwota`='".$kwota."' WHERE `id`=".$aktualizuj;

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
      <label for="id_samochod">Samochód:</label><br>
      <?php
        function edytujSamochod($dane, $name){
          echo "<select name='".$name."'>";
          while($rekord = mysqli_fetch_assoc($dane)){
            echo "<option value='".$rekord['id']."'>".$rekord['marka']."</option>";
          }
        echo "</select><br>";
        }
        
        $query = "SELECT * FROM `samochod`";
        $rezultat = mysqli_query($connect, $query);
        
        edytujSamochod($rezultat, "id_samochod");
      ?>
      <label for="id_mechanik">Mechanik:</label><br>
      <?php
        function edytujMechanika($dane, $name){
          echo "<select name='".$name."'>";
          while($rekord = mysqli_fetch_assoc($dane)){
            echo "<option value='".$rekord['id']."'>".$rekord['nazwisko']."</option>";
          }
        echo "</select><br>";
        }
        
        $query = "SELECT * FROM `mechanik`";
        $rezultat = mysqli_query($connect, $query);
        
        edytujMechanika($rezultat, "id_mechanik");
      ?>
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