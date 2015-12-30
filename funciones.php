<?php 

$file = "imagenes.xml";
$array = Array();


	function anadir_imagen($link,$solucion,$nombre,$correo) {
		global $file;
		
		$imagenes = simplexml_load_file($file);
		
		if($imagenes == false) 
			$imagenes = new SimpleXMLElement($file);
			

		$nuevo = $imagenes->addChild('imagen');
		$nuevo->addChild('link',$link);	
		$nuevo->addChild('solucion',$solucion);
		$usuario = $nuevo->addChild('usuario');
			$usuario->addChild('nombre',$nombre);
			$usuario->addChild('correo',$correo);
		$imagenes->asXML('imagenes.xml');
	}
	
	function guardar_imagen($imagen, $solucion) {
		
		$target_dir = "imagenes/";
		$target_file = $target_dir.$solucion.".png";
			
		$check = getimagesize($imagen);
		if($check !== false) {
			move_uploaded_file($imagen, $target_file);
			return $target_files;
		} else {
			return false;
		}	
	}
	
	function leer_imagenes() {
		global $file;
		global $array;
	
		$xmlDoc = simplexml_load_file($file);
		
		foreach($xmlDoc->imagen as $i) {
			array_push($array, $i);
		}
		
		if($array == false)
			return false;
		
		return true;	
	}
	
	function cargar_imagen() {
		global $array;
		$j = count($array);
		$aux = rand(0, $j-1);
		
		$img = $array[$aux]->link;
		
		$fp = fopen($img, "r");
		$linea = fgets($fp );
		
		return $linea;
	}
	
	function correcto($link, $sol) {
		global $file;
		$xml = simplexml_load_file($file);
		
		foreach($xml->imagen as $i) 
		{
			$f = fopen($i->link, "r");
			$r = fgets($f);
			if($r == $link && $i->solucion == $sol)
					return "true";
		}
				
		return "false";
	}


?>
