<?php

	$xmlFav = simplexml_load_file("favoritas.xml");

	//$id = $xmlFav->movie['imdbID'];

	$volver = "<a href='index.php'>
					<button>volver</button>
			   </a>";
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cinema</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="BS4/bootstrap.min.css">
	<link rel="stylesheet" href="estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto+Slab&display=swap" rel="stylesheet">
</head>
<body>
	<header id="top" >
		<div class="row">
			<div id="logo" class="col-2" href="index.html">
			</div>
			<div class="col-8">
				<h1>PELICULAS FAVORITAS</h1>
			</div>
			<div class="col-2"></div>
		</div>
	</header>


	<main>
		<?= $volver ?>
		<section id="pelisFuente">
			
			<?php foreach($xmlFav->movie as $f){ ?>
				<!-- ID -->
				<div class="col-9">
					<div class="row">
					<?php $id = $xmlFav->movie['imdbID']; ?>	
					
						<div class="col-9"><?= $id ?></div>
					</div>
				</div>
			</div>
			<?php } ?>

		</section>

	</main>


	<script src="BS4/jquery.min.js"></script>
	<script src="BS4/popper.min.js"></script>
	<script src="BS4/bootstrap.min.js"></script>
	<script src="funciones.js"></script>

</body>
</html>