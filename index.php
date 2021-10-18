<?php
  $modul = $_GET['modul'];
  include('pliki/data_base_connect.php');
  
  include 'pliki/header.php';
  include 'pliki/'.$modul.'.php';
  include 'pliki/footer.php';

  include('pliki/data_base_close.php');
?>