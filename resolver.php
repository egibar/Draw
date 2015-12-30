<?php
	include('funciones.php');

	@$q = $_POST["q"];
	
	if($q==1) {
		leer_imagenes();
		$auxi = cargar_imagen();
		echo '<?xml version="1.0" encoding="ISO-8859-1"?>'."\n"."<imagen>\n"."<link>" .$auxi. "</link>\n"."</imagen>\n";
		
	} else if($q == 3) {
		$a = $_POST["sol"];
		$b = $_POST["link"];
		$b = str_replace(" ","+", $b);
		
		$auxi = correcto($b,$a);
		
		echo '<?xml version="1.0" encoding="ISO-8859-1"?>'."\n"."<imagen>\n"."<link>" .$auxi. "</link>\n"."</imagen>\n";
		
	}
?>	
