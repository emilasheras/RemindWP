<?php
  include('connection.php');
  include('CookieCheck.php');
?>

<!--REFERENCE LINKS:
MOST OF BOOSTRAP STUFF IMPLEMENTED IS FROM EXAMPLES HERE: https://getbootstrap.com/docs/4.3/examples/

https://getbootstrap.com/docs/4.3/examples/sign-in/

-->
<?php

  if(isset($_POST['usuario']) && isset($_POST['password'])){
      $usuario=mysqli_real_escape_string($conexion, $_POST['usuario']);
      $password=md5($_POST['password']);
      $request="SELECT usuario,password FROM $table WHERE usuario='$usuario' AND password='$password' LIMIT 1";

      $result=mysqli_query($conexion,$request);

      //FINDS A USER AND PASS
      if(mysqli_num_rows($result)==1){


          $_SESSION['name'] = $usuario;
          $_SESSION['logon'] = true;


          //IF CHECKBOX == TRUE
          if(isset($_POST['check1'])){
              //SETS A COOKIE
              setCookie("user", $usuario, time() + (1*86400), "/"); // 86400 = 1 day // "/" APPLIES IN EVERY DIRECTORY
          }

          //LOOKS ADMIN STATE
          $request="SELECT admin FROM $table WHERE usuario='$usuario' LIMIT 1";
          $result=mysqli_query($conexion,$request);

          //IF CHECKS ADMIN STATE IS TRUE
          $adminstate = mysqli_fetch_assoc($result)['admin'];
          $_SESSION['adminstate'] = $adminstate;

          if($adminstate){
              header("Location: AdministratorPage.php");
          }
          else{

            //NORMAL USER PATHWAY
            $message='Hello '.$_SESSION['name'];
            echo "<script>alert('$message');</script>";
            header("Location: MainPage.php");
          }
      }
      else{
          echo "<script>alert('Invalid user or password');</script>";
      }


  }

?>

<html>
  <head>
    <meta charset="UTF-8">
    <!---From BootstrapCDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--OWNSTYLE-->
    <link href="CSS/signin.css" rel="stylesheet">

  </head>
  <title>
	Login
	</title>
  <!--THE text-center CLASS IS A REFERENCE FROM THE .CSS FILE "singin.css"-->
  <body class="text-center">
    <div class="div-centered mx-auto">
        <form name="FormSignIn" onsubmit="return validateFormData()" class="form-signin" action="Default.php" method="POST">

          <h1 class="mb-3 font-weight-bold">Login</h1>

          <label for="inputUser" class="sr-only">User</label>
          <input type="text" id="inputUser" name="usuario" class="form-control" placeholder="NombreDeUsuario"  autofocus>

          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Ejemplocontraseña123" >


          <div class="checkbox mb-3">
            <!--LABEL CAN SURROUND THE TAG TO POSITION TEXT-->
            <label>
              <input type="checkbox" name="check1" value="remember-me"> Remember me
            </label>
          </div>

          <input class="btn btn-lg btn-primary btn-block" type="submit" value="Log in">

        </form>
    </div>

  <script>
      //VALIDATES FORMS INPUT FIELDS : https://www.w3schools.com/js/js_validation.asp
      function validateFormData() {
          var x = document.forms["FormSignIn"]["usuario"].value;
          var y = document.forms["FormSignIn"]["password"].value;
          if (x == "" && y == "") {
              alert("Name and password must be filled out");
              return false;
          }
          else if (x == ""){
              alert("Name must be filled out");
              return false;
          }
          else if (y == "") {
              alert("Password must be filled out");
              return false;
          }
      }
  </script>

  </body>

</html>
