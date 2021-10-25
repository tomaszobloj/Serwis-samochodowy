<?php
  include('pliki/data_base_connect.php');
  include('pliki/header.php');

  if(isset($_GET['modul'])){
    $modul = $_GET['modul'];
    if($modul == ""){
      include('pliki/strona_glowna.php');
    } else {
      include('pliki/'.$modul.'.php');
    }
  }

  include('pliki/footer.php');
  include('pliki/data_base_close.php');
?>