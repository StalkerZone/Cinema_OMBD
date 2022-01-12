<?php
$apiKey ="3d7ac92c";

	header("Content-Type: application/xml; charset=utf-8");
// pregunta 6
	$resultado = "";
	if( isset($_GET['apikey']) && $_GET['apikey']=="qwerty12345" ){
			$resultado = "Apikey correcta. Cargando api...";	
		}else{
			$resultado = "Invalid Apikey.";
	}


	if( isset($_GET['id']) ){

		$id = $_GET['id'];

		$xmlTitulo = simplexml_load_file("http://www.omdbapi.com/?apikey=$apiKey&i=$id&r=xml&plot=full");
//--------------------------------------------------------------------
		//abro existente y si no existe creo nuevo
		if( file_exists('titulo.xml') ){
				$xmlTitulo = simplexml_load_file("titulo.xml");
		}else{
			$xmlTitulo = new SimpleXMLElement('<root></root>');
		}

		$titulo = [];

		foreach ($xmlTitulo-> as $titulo) {
		
		$titulo = (string)$item->marca;

		if( ! array_key_exists($marca, $marcas) ){
			$marcas[$marca] = 1;
		}else{
			$marcas[$marca] ++ ;
		}
	}

		$xmlTitulo->movie['title'];

		$xmlTitulo->root[0]->addChild('titulo');

		//GUARDAR
		$xmlTitulo->asXML("titulo.xml");

	}
//--------------------------------------------------------------------

	//CREAR
	$xmlNuevo = new SimpleXMLElement('<inventario></inventario>');
	$xmlNuevo->addAttribute('encoding', 'UTF-8');
	$xmlNuevo->asXML("nuevo.xml");
	
		//abro existente y si no existe creo nuevo
		if( file_exists("titulo.xml") ){
			$xml = simplexml_load_file("titulo.xml");
		}else{
			$xml = new SimpleXMLElement('<root></root>');
			$xml->addAttribute('encoding', 'UTF-8');
		}


	//CONSULTAR
	echo $xml->movie;

	//MODIFICAR
	$xml->nombreLibreria = "Biblioteca Municipal";
	
	//ELIMINAR
	unset($xml->movie[0]->autor);
	
	//AÑADIR
	$xml->libro[0]->addChild('fecha','1998');

	//GUARDAR
	$xml->asXML("inventario_".date('Y_m_d').".xml");



?>

<root>
	<resultado><?= $resultado ?></resultado>
</root>


<!-- *************************************************

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cinema</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="BS4/bootstrap.min.css">
	<link rel="stylesheet" href="estilos_servidor.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto+Slab&display=swap" rel="stylesheet">
</head>
<body>
	<header class="jumbotron">
		<div class="text-center">
			Nueva Buscueda: Titulos
		</div>
	</header>

	<main class="container h-100">
		<ul>
			<?php foreach ($ as $key=>$m) { ?>
				<li><?=$key?> : <?=$m?></li>
			<?php } ?>
		</ul>
	</main>

	<script src="BS4/jquery.min.js"></script>
	<script src="BS4/popper.min.js"></script>
	<script src="BS4/bootstrap.min.js"></script>
	<script src="cliente/funciones.js"></script>

</body>
</html>

-->
