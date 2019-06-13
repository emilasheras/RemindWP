<?php
    //ALSO STARTS SESSION FOR EVERY PAGE
    session_start();

    $cookie_name = "user";
    //CHECKS EXISTENCE OF COOKIE AND ECHOS VALUE OF NAME AND CONTENT
    if(!isset($_COOKIE[$cookie_name])) {
        //echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        //echo "Cookie '" . $cookie_name . "' is set!<br>";
        //echo "Value is: " . $_COOKIE[$cookie_name];
    }
?>
