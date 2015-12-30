<?php
	include 'funciones.php';
	
	
	$nom = $_POST["name"];
	$correo = $_POST["correo"];
	$sol = $_POST["sol"];
	$data = $_POST["data"];

	$data = str_replace(" ","+", $data);
	$path = 'imagenes/'.$sol.'.txt';
	$fp = fopen($path, 'w');
	fwrite($fp, $data);
	fclose($fp);
	
	if(!$fp)
		echo 'Ha habido un error';
	else
		anadir_imagen($path, $sol, $nom, $correo);
		echo 'Se ha guardado correctamente';
	
	
?>
