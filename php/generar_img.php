<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('conexion.php');

// Obtener el último turno especial generado
$sql = "SELECT id, turno, fecha_generacion FROM turnos_especiales ORDER BY id DESC LIMIT 1";
$result = $conexion->query($sql);
$row = $result->fetch_assoc();

// Obtener el número de turno y la fecha
$numeroTurno = $row['turno'];
$fechaGeneracion = $row['fecha_generacion'];

// Crear una imagen en blanco (puedes ajustar el tamaño según tus necesidades)
$imagen = imagecreate(400, 200); // Ajusta el tamaño de la imagen
$colorFondo = imagecolorallocate($imagen, 255, 255, 255); // Blanco
$colorTexto = imagecolorallocate($imagen, 0, 0, 0); // Negro

// Ruta de la fuente TrueType (TTF)
$rutaFuente = 'letra.ttf'; // Ajusta la ruta a tu fuente TTF

// Establecer el tamaño de la fuente
$tamanoFuente = 75; // Ajusta el tamaño de la fuente según tus necesidades

// Escribir el número de turno y la fecha en la imagen usando TrueType
imagettftext($imagen, $tamanoFuente, 0, 150, 80, $colorTexto, $rutaFuente, $numeroTurno);
imagettftext($imagen, 19, 0, 130, 160, $colorTexto, $rutaFuente, $fechaGeneracion);

// Establecer el tipo de contenido de la respuesta como una imagen PNG
header('Content-Type: image/jpg');

// Mostrar la imagen
imagepng($imagen);

// Liberar la memoria de la imagen
imagedestroy($imagen);
?>
