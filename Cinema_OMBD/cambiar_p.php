<?php
	//Registration
	session_start();

	//if ($_SESSION['user']) {
	//	header('Location: profile.php');
	//}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Signup</title>
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
			<!-- Validation Form Inicio -->
			<form class="" action="include/signin.php" method="post">
				<h1>Cambiar contraseña</h1>
				<input type="text" class="form-control" name="psw1" 
				placeholder="Contraseña antigua" required>
				<input type="password" class="form-control" name="psw2" 
				placeholder="Contraseña nueva" required>
				<button type="submit" class="btn btn-info" name="cambiar" value="cambiar">Cambiar</button>
				<p>
				<a href="profile.php">Volver!</a>
				</p>
				<?php
					if ( isset($_SESSION['message']) ){
						echo '<p class="msg"> '.$_SESSION['message'].'</p>';
					}
					unset ($_SESSION['message']);
 				?>
			</form>
			<!-- Validation Form Final -->
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