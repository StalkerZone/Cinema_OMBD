<?php
session_start();
   
$verFicha = "display:none";
$mosaico = "";
$volver = "";
$formbuscar = "";
$error = "";
$favoritas="";
$pagina = 1;
$apiKey ="3d7ac92c";
$xmlFav = "";

$totalPeliculas = 0;
$cantidadPaginas = 0;

if (isset($_GET['pag']) ){
	$pagina = $_GET['pag'];
	$_SESSION['pagina'] = $_GET['pag'];
} else {
	$_SESSION['pagina'] = 1;
}


$_SESSION['pagina'] = $pagina;

if( isset($_GET['id']) ){

	$id = $_GET['id'];
	//$id='tt1201607';
	//$id='tt1981115';

	$xml = simplexml_load_file("http://www.omdbapi.com/?apikey=$apiKey&i=$id&r=xml&plot=full");

	$poster = $xml->movie['poster'];
	$titulo = $xml->movie['title'];
	$anyo = $xml->movie['year'];
	$director = $xml->movie['director'];
	$duracion = $xml->movie['runtime'];
	$descripcion = $xml->movie['plot'];

	$verFicha = "";
	$volver = "<a href='index.php'>
					<button>volver</button>
				</a>";
}

else{

	$posters = array(
					 "tt0337978"=>"https://m.media-amazon.com/images/M/MV5BNDQxMDE1OTg4NV5BMl5BanBnXkFtZTcwMTMzOTQzMw@@._V1_SX300.jpg",
					 "tt0106965"=>"https://m.media-amazon.com/images/M/MV5BMjZmZjM1NWEtYTllYy00NmIyLWEzN2EtZmQ5Yjk1ODAyZmE1XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg",
					 "tt1124037"=>"https://m.media-amazon.com/images/M/MV5BMTA4NTYyMTcwNTFeQTJeQWpwZ15BbWU4MDI0NTg0MDkx._V1_SX300.jpg",
					 "tt4158096"=>"https://m.media-amazon.com/images/M/MV5BOWZjMDVhMDgtMTljZC00NmM0LWE1ODYtNGZmMGRhZTc3MTg2XkEyXkFqcGdeQXVyNTAzMTY4MDA@._V1_SX300.jpg",
					 "tt1621039"=>"https://m.media-amazon.com/images/M/MV5BNjE0NjIwMzAwOF5BMl5BanBnXkFtZTgwOTIyMzMzMDE@._V1_SX300.jpg",
					 "tt2617828"=>"https://m.media-amazon.com/images/M/MV5BMTc3MjgwNTEzNV5BMl5BanBnXkFtZTcwNTM5MzY5OQ@@._V1_SX300.jpg",
					 "tt0113114"=>"https://m.media-amazon.com/images/M/MV5BZWY3OWY3MjUtN2E3NS00M2RkLWI5MWUtMmI4MjQ0MjFmZjM2XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg",
					 "tt3203290"=>"https://m.media-amazon.com/images/M/MV5BMTYxMjk0OTUwMF5BMl5BanBnXkFtZTgwNTY0ODIzMDE@._V1_SX300.jpg",
					 "tt7775622"=>"https://m.media-amazon.com/images/M/MV5BMjMwYjcwNWQtNTQ5YS00MzVlLTkxYzMtNDIwZWIxZTE4Zjg2XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg",
					 "tt0119152"=>"https://m.media-amazon.com/images/M/MV5BMTA2ZmNkZDYtZjE2MC00ZmY0LWI5YjctMTI3NDcxMTNiMDIxXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg"
				);

	if( isset($_POST['buscar']) || isset($_SESSION['buscar']) ){

		if(isset($_POST['buscar'])){
			$s = $_POST['buscar'];
			$_SESSION['buscar'] = (string)$s;
		}
		$s = $_SESSION['buscar'];



		$xml = simplexml_load_file("http://www.omdbapi.com/?apikey=$apiKey&s=&s=$s&type=movie&r=xml&page=$pagina");

		$totalPeliculas = $xml['totalResults'];
		$cantidadPaginas = intval($totalPeliculas/10);


		if(! isset($xml->error)){
			$posters = array();
		}else{
			$mosaico = "<h3>".(string)$xml->error."</h3>";
		}

		foreach ($xml->result as $peli) {
			$id = (string)$peli['imdbID'];
			$poster = (string)$peli['poster'];

			$posters = array_merge($posters,
								   array($id=>$poster) );
		}

	}

	$formbuscar="<form method='POST' action='index.php'>
			<input type='text' name='buscar' placeholder='Título de la película' value='$s' autofocus>
			<button type='submit' class='btn btn-info'>Buscar</button>
			</form>";
	$favoritas="<a href='index_2.php'></a>";


	
	foreach ($posters as $key => $p) {
		$mosaico .= 
				"<a href='index.php?id=$key'>
					<div style='height:calc(30vw - 8px); 
						width:calc(20vw - 8px);
						float:left; 
						background-image:url(\"$p\");
						background-size:cover;
						border:1px solid grey'>
					</div>
				</a>";
	}
}

// guardamos id de la Pelicula 
   if( isset($_POST['favorita']) ){

        $id = (string)$peli['imdbID'];

        $cliente->call("guardarFavorito", array("id"=>$id));

        header("Location: index.php");
    }
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
<body onload="start()">
	<header id="top" >
		<div class="row">
			<div id="logo" class="col-2" href="index.html">
				<a href="http://www.omdbapi.com" target="_blank">OMBD</a>
			</div>
			<div class="col-8">
				<h1>CINEMA HOME</h1>
			</div>
			<div class="col-2">
				<a class="btn btn-default" href="main.php">Signup</a>
			</div>
		</div>
	</header>


	<div id="nav" class="row bg-white border-bottom shadow-sm">
		<div class="col-6">
			<nav class="my-2 my-md-0 mr-md-3">
	    		<a class="p-2" href="index_2.php">Favoritas</a>
	  		</nav>
		</div>
		<div class="col-6">
			<?= $formbuscar ?><?= $error ?>
		</div>
	</div>

	<?= $volver ?>

	<main>

		<?= $mosaico ?>
		<table style="<?= $verFicha ?>">
			<tr>
				<td>
					<img src="<?= $poster ?>">
				</td>
				<td><div>
					<p>	<span class="left">Título:</span>
						<span class="right"><?=$titulo?></span>
					</p>
					<p>	<span class="left">Año:</span>
						<span class="right"><?=$anyo?></span>
					</p>
					<p>	<span class="left">Director:</span>
						<span class="right"><?=$director?></span>
					</p>
					<p>	<span class="left">Duración:</span>
						<span class="right"><?=$duracion?></span>
					</p> 
					<p>	<span class="left">Sinopsis:</span>
						<span class="right"><?=$descripcion?></span>
					</p> 

				</div></td>
			</tr>
		</table>

		<div style="clear:both;"></div>
	</main>

	<div id="paginacion" class="text-center container">
		<?php	 
			echo "Encontrados : ".$totalPeliculas." titulos";
		?>	

		<div class="row">
			<div class="col-3">
				<?php
				if ($_SESSION['pagina']>1) { ?>
					<a class="btn btn-default" href="?pag=<?=$_SESSION['pagina']-1?>">Anterior</a>	
				<?php } ?>
			</div>
			<div class="col-6">
				<?php		
				echo "<br>".$_SESSION['pagina']." ... ".$cantidadPaginas."<br>";
				?>	
			</div>
			<div class="col-3">
				<?php
				if ($_SESSION['pagina']<$cantidadPaginas) { ?>
					<a class="btn btn-default" href="?pag=<?=$_SESSION['pagina']+1?>">Seguinte</a>
				<?php } ?>
			</div>
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