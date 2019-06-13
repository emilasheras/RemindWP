<?php

    //REDIRECTS IF SESSION ISNT SET BEFOREHAND
    if (!session_id()){
        session_start();
    }

    //IF SESSION WASNT LOGGED BEFOREHAND
    if (!$_SESSION['logon']){
        header("Location: Default.php");
        exit();
    }

    //IF SESSION ISNT ADMIN
    if(!$_SESSION['adminstate']){
        //echo "<script>alert('$_SERVER[REQUEST_URI]');</script>";
        //SET OF ADMIN PAGES
        if($_SERVER['REQUEST_URI'] == '/proyectos/PaginaEmi/AdministratorPage.php'){
            header("Location: MainPage.php");
            exit();
        }
        /*
        if....
        if...
        if..
        etc
        */
    }
?>
