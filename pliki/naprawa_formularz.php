<form action="index.php?modul=naprawa_dane" method="POST">
  <fieldset>
    <legend>Dane naprawy:</legend>
      <label for="id_samochod">Samochód:</label><br>
      <?php
        function wybierzSamochod($dane, $name){
          echo "<select name='".$name."'>";
          while($rekord = mysqli_fetch_assoc($dane)){
            echo "<option value='".$rekord['id']."'>".$rekord['marka']."</option>";
          }
        echo "</select><br>";
        }
        
        $query = "SELECT * FROM `samochod`";
        $rezultat = mysqli_query($connect, $query);
        
        wybierzSamochod($rezultat, "id_samochod");
      ?>
      <label for="id_mechanik">Mechanik:</label><br>
      <?php
        function wybierzMechanika($dane, $name){
          echo "<select name='".$name."'>";
          while($rekord = mysqli_fetch_assoc($dane)){
            echo "<option value='".$rekord['id']."'>".$rekord['nazwisko']."</option>";
          }
        echo "</select><br>";
        }
        
        $query = "SELECT * FROM `mechanik`";
        $rezultat = mysqli_query($connect, $query);
        
        wybierzMechanika($rezultat, "id_mechanik");
      ?>
      <label for="data">Data naprawy:</label>
      <input type="date" name="data"><br/>
      <label>Kwota:</label>
      <input type="number" name="kwota"><br/>
      <input type="submit" value="Wyślij">
  </fieldset>
</form>