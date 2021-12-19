<?php
function sprawdzDane($postLogin, $postHaslo){
    $login = 'admin';
    $haslo = 'admin';

    if($postLogin == $login and $postHaslo == $haslo){
        return 1;
    }
    else{
        return false;
    }
}
session_start();
/*if(isset($_REQUEST['wyloguj'])){
    session_destroy();
    include('pliki/wylogowano.php');
    exit;
}*/
if(isset($_POST['login'], $_POST['haslo'])){
    if($uzytkownik = sprawdzDane($_POST['login'], $_POST['haslo'])){
        $_SESSION['zalogowany'] = $uzytkownik;
        header('location: index.php');
        exit;
    }
    else{
        header('location: index.php');
    }
}
if(!isset($_SESSION['zalogowany'])){
    include('logowanie.php');
    exit;
}
?>