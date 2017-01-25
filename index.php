<?php

include "imagenEnCapas.php";

//creo una imagen por capas de 327x66
$imagen = new ImagenEnCapas(327,66);

//agrego 3 capas
$imagen->agregarCapa('imagenes/fondo.png');
$imagen->agregarCapa('imagenes/dibujo.png');
$imagen->agregarCapa('imagenes/letras.png');

//retorno la imagen
$imagen->obtenerImagen();