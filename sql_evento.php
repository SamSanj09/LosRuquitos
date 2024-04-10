<?php
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

	//--------------------------

	function alta ($nombre_evento,$descripcion_evento,$fecha_evento,$costo_foto_evento,$imagen_evento)
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

	//--------------------------

	function baja ($id)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de baja. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "DELETE FROM eventos_info WHERE codigo_evento = $id";

		echo $consulta . "<BR>";

		$resultado=mysqli_query($conexion,$consulta);

		//echo "Resultado de la operaci&oacute;n: " . $resultado;

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);

	}

	//--------------------------

	function modificacion ($id,$nombre_evento,$descripcion_evento,$fecha_evento,$costo_foto_evento,$imagen_evento)
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

?>
