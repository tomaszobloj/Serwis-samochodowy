<?php
  $modul = $_GET['modul'];
  include 'pliki/header.php';
  include 'pliki/'.$modul.'.php';
  include 'pliki/footer.php';
?>