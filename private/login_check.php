<?php

//tento skript sa vykona po tom, co uzivatel zada prihlasovacie udaje => porovnavaju sa s udajmi v datavaze

    include dirname(__FILE__).'/../framework/helpers.php'; //nacitam funkcie na vytahovanie dat z databazy pre porovnavanie uzivatela s udajmi z form
    if( !empty($_POST)) { //ak premenna post nie je prazdna tak ... 
        if(  !empty($_POST['email']) && !empty($_POST['password']) ) { //ak sme zadali do inputu nas email a heslo
           
            $user = db_single("SELECT * FROM users WHERE email = '".$_POST['email']."'"); 
            /*do premennej user vytiahneme Z DATABAZY email, ktory sa zhoduje s emailom ktory sme zadali do formulara */
           
            if( !empty($user->email) && $user->email === $_POST['email']) {
             //ak v databaze je dany email a zhoduje sa s emailom co zadal pouzivatel...

                if( $user->password === $_POST['password']) { //ak heslo v databaze sa zhoduje s heslom zadanym do inputu...
                    
                    session_start(); //zacneme session
                    $_SESSION['email'] = $_POST['email']; //do premennej session sa pridana hodnota z inputu kde som zadal email
                    header('Location: index.php');       //a stranka nas presmeruje na index.php             
           
                }else {
                    echo 'Zadali ste nespravne heslo!';
                }
           
            } else {
                echo 'User neexistuje!';
            }
        
        } else {
            echo 'Email ani heslo nie su zadane!';
        }
    }            
    

?> 