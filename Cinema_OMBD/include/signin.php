<?php
	// 
	session_start();
	require_once 'variables.php';

	// CREAR BASE DE DATOS
	$connect = new mysqli($servidor, $usario, $psw);
	$sql = "CREATE DATABASE IF NOT EXISTS $bd";
	
		if( !$connect) {
		die('Error connect to DataBase');
	}
	$connect->query($sql);
	$connect->close();

	// CREAR TABLA
	$connect = new mysqli($servidor, $usario, $psw, $bd);
			if( !$connect) {
		echo('Error connect to DataBase');
	}
	$sql = "CREATE TABLE IF NOT EXISTS `users` 
					( `id` INT(11) NOT NULL AUTO_INCREMENT, 
					`nombre` VARCHAR(50) NULL, 
					`apellido` VARCHAR(50) NULL, 
					`login` VARCHAR(50) NULL, 
					`email` VARCHAR(50) NULL, 
					`password` VARCHAR(50) NULL, 
					`avatar` VARCHAR(50) NULL, 
					PRIMARY KEY (`id`)) 
					CHARACTER SET utf8";
	$connect->query($sql);
//	$connect->close();


	// VERIFICAR DATOS 
	if( isset($_POST['signin']) ){
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$sql = "SELECT * 
				FROM `Users` 
				WHERE `login` = '$login'
				AND `password` = '$password'";
		$resultado = $connect->query($sql);

		if( $resultado->num_rows>0 ){ // EXISTE USUARIO	
			$row = $resultado->fetch_assoc();
			if( $row['password'] == $password ){
			$_SESSION['login'] = $row['login'];
			header('Location: ../profile.php'); 
				} else {
					$_SESSION['message'] = 'Contraseña incorrecta';
					header('Location: ../main.php'); 
				}
			} else { // NO EXISTE USUARIO
				$_SESSION['message'] = 'Este usuario no existe';
				header('Location: ../main.php');
			}
			
		}
			$conn->close();
		
?>

