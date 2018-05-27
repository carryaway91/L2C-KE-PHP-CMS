<?php
session_start();

if(empty($_SESSION['email'])) {
    header('Location: login.php');
}

//zaciname session, ak v premennej session nie je uvedeny email - cize nie je prihlaseny pouzivatel, tak ho presmerujeme 
//funkciou na podstranku private/login.php
?>