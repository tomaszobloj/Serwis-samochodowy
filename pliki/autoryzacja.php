<?php
function sprawdzDane($postLogin, $postHaslo){
    $login = 'admin';
    $haslo = 'admin';

    if($postLogin == $login and $postHaslo == $haslo){
        return true;
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
}
if(isset($_POST['login'], $_POST['haslo'])){
    if($uzytkownik = sprawdzDane($_POST['login'], $_POST['haslo'])){
        $_SESSION['zalogowany'] = $uzytkownik;
        header('location: index.php');
        exit;
    }
    else{
        header('location: index.php');
    }
}*/
if(isset($_POST['login'], $_POST['haslo'])){
    if(preg_match("/[a-zA-Z0-9 ]/", $_POST['login']) && preg_match("/[a-zA-Z0-9 ]/", $_POST['haslo'])){
        if($uzytkownik = sprawdzDane($_POST['login'], $_POST['haslo'])){
            $_SESSION['zalogowany'] = $uzytkownik;
            header('location: index.php');
        } else {
            bladLogowania:
            echo '<b style="color: red;">NIEPRAWIDŁOWY LOGIN LUB HASŁO!</b>';
            include('pliki/logowanie.php');
        }
    } else {
        goto bladLogowania;
    }
    exit;
}
if(!isset($_SESSION['zalogowany'])){
    include('logowanie.php');
    exit;
}
?>