<?php
    include dirname(__FILE__).'/../framework/helpers.php';

    if( !empty($_POST)) {
        if(  isset($_POST['email']) && isset($_POST['password']) ) { //overujeme ci v databaze sa nachadza polozka email a pass
            $user = db_single("SELECT * FROM users WHERE email = '".$_POST['email']."'"); // ak ano 
            if( !empty($user)) {
                if( $user->password === $_POST['password']) {
                    echo 'Vase heslo je: '. $user->password;
                }else {
                    echo 'Nesuhlasi!';
                }
            } else {
                echo 'user neexistuje!';
            }
        } else {
            echo 'Email ani heslo nie su zadane!';
        }
    } else {

    }            
    

?> 