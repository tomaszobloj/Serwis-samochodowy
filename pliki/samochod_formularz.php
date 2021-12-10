<form action="index.php?modul=samochod_dane" method="POST">
  <fieldset>
    <legend>Dane samochodu:</legend>
      <label for="id_klient">Klient:</label><br>
      <?php
        function lista($dane, $name){
          echo "<select name='".$name."'>";
          while($rekord = mysqli_fetch_assoc($dane)){
            echo "<option value='".$rekord['id']."'>".$rekord['nazwisko']."</option>";
          }
        echo "</select><br>";
        }
        
        $query = "SELECT * FROM `klient`";
        $rezultat = mysqli_query($connect, $query);
        
        lista($rezultat, "id_klient");
      ?>
      <label for="marka">Marka:</label>
      <input type="text" name="marka"><br>
      <label>Model:</label>
      <input type="text" name="model"><br>
      <label>Rocznik:</label>
      <input type="number" name="rocznik"><br>
      <label>Przebieg:</label>
      <input type="number" name="przebieg"><br>
      <input type="submit" value="Wyślij">
  </fieldset>
</form>