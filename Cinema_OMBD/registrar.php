<?php
	//Registration Form
	session_start();

	//if ($_SESSION['user']) {
	//header('Location: profile.php');
	//}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/favicon.ico">
	<link rel="stylesheet" href="BS4/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos_main.css">
</head>
<body>
	<div class="container mt-4">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6 col-sm-12">	
			<form class="" action="include/signup.php" method="POST" enctype="multipart/form-data">
				<h1>Formulario de registro</h1>
				<input type="text" class="form-control" name="nombre" 
				placeholder="Nombre" required>
				<input type="text" class="form-control" name="apellido"
				placeholder="Apellido" required>
				<input type="text" class="form-control" name="login" 
				placeholder="Login" required>
				<input type="email" class="form-control" name="email"
				placeholder="E-mail" required>
				<input type="file" name="avatar">
				<input type="password" class="form-control" name="psw1" 
				placeholder="Contraseña" required>
				<input type="password" class="form-control" name="psw2" 
				placeholder="Repite contraseña" required>
				<button type="submit" class="btn btn-info" name="Signup" value="Signup">Registrar</button>
				<p>Ya estas registrado?
				<a href="main.php">Inicia sesión!</a>
				</p>

				<?php
					if ( isset($_SESSION['message']) ){
						echo '<p class="msg"> '.$_SESSION['message'].'</p>';
					}
					unset ($_SESSION['message']);
 				?>
			</form>
			</div>
			<div class="col-lg-3"></div>
		</div>
	</div>
<!--Inicio Footer -->
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2019-2020 Rentavik<span>k</span></p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
<!--Final de Footer-->

	<script src="BS4/jquery.min.js"></script>
	<script src="BS4/popper.min.js"></script>
	<script src="BS4/bootstrap.min.js"></script>
	<script src="funciones.js"></script>

</body>
</html>