<?php
    include('CookieCheck.php');
    include('Redirect.php');

?>
<html lang="es">
    <title>
    Home
    </title>
    <head>
        <title>Cover Template · Bootstrap</title>

        <!---From BootstrapCDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    		<!-- Optional JavaScript -->
    		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <link href="CSS/mainpage.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <header>
            <nav class="nav-container navbar-expand-md navbar-dark fixed-top">
                <a class="navbar-brand" href="#">RE()</a>
                <div>
                    <a class="nav-link active" href="MainPage.php">Home</a>
                    <a class="nav-link" href="AdministratorPage.php">How to</a>
                    <a class="nav-link" href="#">Browser Extension</a>
                    <a class="nav-link" href="#">Telegram Bot</a>
                    <a class="nav-link" href="#">Contact</a>
                </div>
            </nav>
        </header>
        <div class="body-container">
            <div class="reminder-bar-container">
              
            </div>
        </div>
    </body>
</html>
