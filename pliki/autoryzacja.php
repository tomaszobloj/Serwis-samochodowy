<?php
function sprawdzDane($postLogin, $postHaslo){
    $login = 'admin';
    $haslo = 'admin';

    if($postLogin == $login && $postHaslo == $haslo){
        return 1;
    }
    else{
        return false;
    }
}
session_start();
if(!isset($_SESSION['zalogowany'])){
    include('pliki/logowanie.php');
    exit;
}
if(isset($_REQUEST['wyloguj'])){
    session_destroy();
    include('pliki/logowanie.php');
    exit;
}
if(isset($_POST['login']) && isset($_POST['haslo'])){
    if($uzytkownik = sprawdzDane($_POST['login'], $_POST['haslo'])){
        $_SESSION['zalogowany'] = $uzytkownik;
        include('index.php');
        exit;
    }
    else{
        header('location: index.php');
    }
}
?>