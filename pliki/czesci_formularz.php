<form action="index.php?modul=czesci_dane" method="POST">
  <fieldset>
    <legend>Dane części:</legend>
    <label for="nazwa">Nazwa:</label>
    <input type="text" name="nazwa"><br>
    <label>Cena:</label>
    <input type="number" step="0.01" name="cena"><br>
    <label>Stan magazynowy:</label>
    <input type="number" name="stan"><br>
    <input type="submit" value="Wyślij">
  </fieldset>
</form>