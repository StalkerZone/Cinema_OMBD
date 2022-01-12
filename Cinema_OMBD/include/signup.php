<?php

	require_once 'connect.php';
	require_once 'variables.php';


	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$login = $_POST['login'];
	$email = $_POST['email'];
	$psw1 = $_POST['psw1'];
	$psw2 = $_POST['psw2'];

	$sql = "SELECT * 
				FROM Users 
				WHERE login = '$login'";
	$resultado = $connect->query($sql);

	if( $resultado->num_rows>0 ){ // EXISTE USUARIO	

		$_SESSION['message'] = "Ese nombre de usuario está ocupado. Piensa otro";
	} else {
	if( $psw1 === $psw2) {

		//$_FILES['avatar']['name']
		$path ='uploads/' . time() . $_FILES['avatar']['name'];
		if ( !move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) { $_SESSION['message'] = 'Error al cargar la imagen';
			header('Location: ../registrar.php');
		}

		//contrasena cifrada
		//$psw1 = password_hash($psw1, PASSWORD_DEFAULT);

		// guardamos los datos dentro tabla 'users'
		$connect = new mysqli($servidor, $usario, $psw, $bd);
		mysqli_query($connect, "INSERT INTO `users` 
			(`id`, `nombre`, `apellido`, `login`, `email`, `password`, `avatar`) 
			VALUES (NULL, '$nombre', '$apellido', '$login', '$email', '$psw1', '$path')");
		$_SESSION['message'] = 'Registro completado';
		header('Location: ../main.php');

	} else {

		$_SESSION['message'] = 'Las contraseñas no coinciden!';
		header('Location: ../registrar.php');
	}

	}


?>

