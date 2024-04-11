<?php
// Verificar si la función Conectarse ya está definida
if (!function_exists('Conectarse')) {
    function Conectarse()
    {//inttroducimos los datos de  host que son "Server", "usuario" y "contraseña" 
        if (!($link=mysqli_connect("localhost","root","")))//aca hay que introducir los datos que especifique arriba!!!
        {
            return 0;
        }
        if (!mysqli_select_db($link,"ruquitos"))
        {
            return 0;
        }
        return $link;
    }
}

	//--------------------------
	if (!function_exists('alta')) {
	function alta($nombre_evento, $descripcion_evento, $fecha_evento, $costo_foto_evento, $imagen_evento)
    	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "INSERT INTO eventos_info (nombre, descripcion, fecha, costo_foto,imagen) VALUES ('$nombre_evento', '$descripcion_evento','$fecha_evento','$costo_foto_evento','$imagen_evento')";

		

            

		$resultado=mysqli_query($conexion,$consulta);

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);
		}
	}

	//--------------------------
// Modifica la función baja para recibir el ID del evento como parámetro
if (!function_exists('baja')) {
    function baja($id)
    {
		$conexion = Conectarse();

		if (!$conexion)
		{
			echo "<h1>No se puede dar de baja. Error al conectar.</h1>";
			exit();
		}

		// Escapa el ID para evitar inyección SQL
		$id = mysqli_real_escape_string($conexion, $id);

		// Construye la consulta de eliminación
		$consulta = "DELETE FROM eventos_info WHERE codigo_evento = '$id'";

		// Ejecuta la consulta
		$resultado = mysqli_query($conexion, $consulta);

		if ($resultado) {
			echo "<p>El evento con ID $id ha sido eliminado correctamente.</p>";
		} else {
			echo "<p>Ocurrió un error al intentar eliminar el evento.</p>";
		}

		// Cierra la conexión
		mysqli_close($conexion);
	}

}
	//--------------------------
	if (!function_exists('modificacion')) {
		function modificacion($id, $nombre_evento, $descripcion_evento, $fecha_evento, $costo_foto_evento, $imagen_evento)
		{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.

		/*
		UPDATE agenda SET nombre = 'pepe3',
						tel = '467641_1',
						direccion = 'ch 149_1',
						mail = 'pepe@host2.com.ar' WHERE agenda.id =2
		*/

		$consulta = "UPDATE eventos_info SET nombre='$nombre_evento',descripcion='$descripcion_evento',fecha='$fecha_evento',costo_foto='$costo_foto_evento',imagen='$imagen_evento'";
                $consulta = $consulta . "WHERE codigo_evento='$id'";


		echo $consulta;

		$resultado=mysqli_query($conexion,$consulta);

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);
	}
}
?>
