<?php

class ImagenEnCapas{

	private $capas = array();
	private $ancho;
	private $alto;

	public function __construct($w,$h){
		$this->ancho = $w;
		$this->alto = $h;
	}

	public function agregarCapa($ruta_a_imagen){
		//guardo las rutas a las imagenes que quiero agregar
		$this->capas[] = $ruta_a_imagen;
	}

	public function obtenerImagen(){
		//crear una imagen nueva.
		$imagen_de_salida = imagecreatetruecolor($this->ancho, $this->alto);
		//indicar que se utilizar canal alpha para las transparencias
		imagealphablending($imagen_de_salida, true);
		imagesavealpha($imagen_de_salida, true);

		foreach ($this->capas as $capa) {
			//creo una imagen
			$imagen_capa = imagecreatefrompng( dirname(__FILE__) . '/' .  $capa );
			//la imprimo sobre la imagen actual (destino,origen,destino_x,destino_y,origen_x,origen_y,origen_width,origen_height)
			imagecopy($imagen_de_salida, $imagen_capa, 0, 0, 0, 0, $this->ancho, $this->alto);
		}
		//renderizar como png.
		header('Content-Type: image/png');
		imagepng($imagen_de_salida);
	}
}