<?php
	//User Form
	session_start();
	//if ( !$_SESSION['user']) {
	//	header('Location: /');
	//}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/favicon.ico">
	<link rel="stylesheet" href="BS4/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos_profile.css">
</head>
<body>
	<div class="container mt-4">
		<div class="row">
			<div class="col-lg-1"></div>
			<div id="profile" class="col-lg-10 col-sm-12">
				<h1>User form</h1>	
			<!-- User Form Inicio -->
			
				<img src="<?= $_SESSION['avatar'] ?>"
				width="200" height="200" alt="">
				<h2><?= $_SESSION['login'] ?></h2>
				<h3><?= $_SESSION['email'] ?></h3>
			<form id="profile" action="" method="POST">
				<a class="btn btn-default" href="cambiar_p.php" name="Password">Cambiar password</a>
				<button type="submit" class="btn btn-info" name="Logout" value="Logout"><a href="include/logout.php"></a>Salir</button>
			</form>
			<!-- user Form Final -->
			</div>
			<div class="col-lg-1"></div>
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