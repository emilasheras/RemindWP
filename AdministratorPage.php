<?php
		include('connection.php');
		include('CookieCheck.php');
		include('Redirect.php');


		//Verificacion de variables setteadas
		if(isset($_POST['flag']) || isset($_POST['usuario']) || isset($_POST['password']) || isset($_POST['mail']) || isset($_POST['nombre'])){



			//BUTTON SWITCH
			switch($_POST['flag']){
				//AGREGAR
				case 1:
					//verificacion variables con valores
					if($_POST['usuario']==null || $_POST['password']==null || $_POST['mail']==null || $_POST['nombre']==null){

						echo '<script type="text/javascript">alert("No debe dejar campos vacios (error 1)");</script>';

					}
					else{
						echo '<script type="text/javascript">alert("Informacion Agregada");</script>';

						$usuario =mysqli_real_escape_string($conexion, $_POST['usuario']);
						$password = md5($_POST['password']);
						$mail = $_POST['mail'];
						$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
						if(!isset($_POST['admin'])){
								$request = "INSERT INTO $table (nombre,usuario,password,mail) VALUES('$nombre','$usuario','$password','$mail')";
						}
						else {
								$request = "INSERT INTO $table (nombre,usuario,password,mail,admin) VALUES('$nombre','$usuario','$password','$mail','1')";
						}

						mysqli_query($conexion, $request);

					}

					break;
				//ELIMINAR
				case 2:
					if($_POST['usuario']==null){
						echo '<script type="text/javascript">alert("No debe dejar campos vacios (error 2)");</script>';
					}
					else{
						echo '<script type="text/javascript">alert("Informacion Eliminada");</script>';

						$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);

						$request = "DELETE FROM $table WHERE usuario='$usuario'";

						mysqli_query($conexion, $request);

					}
					break;
			}

		}
		else{
			echo '<script type="text/javascript">alert("Variables aun no setteadas");</script>';
		}


		//table manager
		$consulta="SELECT * FROM $table";
		$resultado=mysqli_query($conexion,$consulta);

?>

<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<!--OWNSTYLE-->
		<link rel="stylesheet" type="text/css" href="CSS/AdmPage.css">

	</head>

	<title>
	ADMIN PAGE
	</title>

	<body>
			<div class="div-table">
					<!--tabla-->
					<table class="table">
							<!--table header-->
							<thead class="thead-dark">
									<!--table column-->
									<tr class="text-uppercase">
											<!--table row-->
											<th>usuario</th> <th>password</th> <th>mail</th> <th>nombre</th> <th>admin</th>
									</tr>
							</thead>
							<tbody>
									<?php
											while($row=mysqli_fetch_assoc($resultado)){
									?>
									<tr>
											<td><?php echo $row['usuario'] ?></td>
											<td><?php echo $row['password'] ?></td>
											<td><?php echo $row['mail'] ?></td>
											<td><?php echo $row['nombre'] ?></td>
											<td><?php echo $row['admin'] ?></td>
									</tr>
									<!--while fetches each row of the table in the database and then each php statement sets it in the table-->
									<?php } ?>

							</tbody>

					</table>
			</div>

			<div class="form-container">
					<h3>AGREGAR</h3>
					<form action="AdministratorPage.php" method="POST">

							<input type="hidden" name="flag" value="1">
							<!--variables de usuario-->
							<input type="text" name="usuario" placeholder="NombreDeUsuario" required></br>
							<input type="text" name="password" placeholder="Ejemplocontraseña123" required></br>
							<input type="text" name="mail" placeholder="ejemplomail@dominio.com" required></br>
							<input type="text" name="nombre" placeholder="Nombre" required></br>
							<label for="adm">IS ADMIN<label>
							<input type="checkbox" name="admin" id="adm">
							<input type="submit" value="agregar">
					</form>
			</div>
			<div class="form-container">
					<h3>ELIMINAR</h3>

					<form action="AdministratorPage.php" method="POST">

							<input type="hidden" name="flag" value="2">
							<!--variables de usuario-->
							<input type="text" name="usuario" placeholder="NombreDeUsuario" required></br>

							<input type="submit" value="eliminar">

					</form>
			</div>
	</body>
</html>
