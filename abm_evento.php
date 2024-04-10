<html>
	<head>
        
		<!-- de acuerdo al contenido de la variable "accion", escribimos el título -->
		<?php
			if ($_GET["accion"] == "alta")
				echo "<title>" . "Alta de registro" . "</title>";

			if ($_GET["accion"] == "baja")
				echo "<title>" . "Baja en la agenda" . "</title>";

			if ($_GET["accion"] == "modificacion")
				echo "<title>" . "Modificaci&oacute;n en agenda" . "</title>";
		?>
	</head>

	<body bgcolor="#ffb6c1" >

		<?php
			// Acá mostramos la pantalla de carga de ALTAS.
			if ($_GET["accion"] == "alta")
			{
            echo "<center>";				
				echo "<h1><font color=\"blue\">Agregar Evento</font></h1>";
				echo "<br>";
				echo "<FORM ACTION=\"abm_evento.php\" METHOD=\"GET\">";
					echo "Nombre del Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtnameevento\">" . "<BR>";
					echo "<BR>";
					echo "Descripcion del Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtdescripcion\">" . "<BR>";
					echo "<BR>";
					echo "Fecha del Evento:    " .   "<INPUT TYPE=\"TEXT\" NAME=\"txtfecha\">" .   "<BR>";
					echo "<BR>";
					echo "Costo Foto Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtcosto_foto\">" . "<BR>";
					echo "<BR>";
					echo "Imagen de Evento: " . "<INPUT TYPE=\"FILE\" NAME=\"txtimagen\">" . "<BR>";
					echo "<BR>";
					echo "<INPUT TYPE=\"submit\" NAME=\"OK\">";
					echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_alta\">";

				echo "</FORM>";

				echo "</center>";

				exit();
			}
		?>

		<?php
			// Acá, en base a los datos recibidos (nombre, telefono, direccion, etc), hacemos el alta.
			if ($_GET["accion"] == "realizar_alta")
			{
				include("sql_evento.php");

				$nameevento = $_GET["txtnameevento"];
				$descripcion = $_GET["txtdescripcion"];
				$fecha = $_GET["txtfecha"];
				$costo_foto = $_GET["txtcosto_foto"];
				$imagen_evento = $_GET["txtimagen"];
				alta ($nameevento,$descripcion,$fecha,$costo_foto,$imagen_evento);

				
			}
		?>

		

		<?php
			//Acá solicitamos el ID para poder modificar el registro.
			if ($_GET["accion"] == "modificacion")
			{
            echo"<center>";				
				echo "<h1><font color=\"blue\">Modificar un Evento<font></h1>";
				echo "<br>";
				echo "<FORM ACTION=\"abm_evento.php\" METHOD=\"GET\">";
					echo "Numero de Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtId\">" . "<BR>";
					echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"datos_modificacion\">";
				echo "</FORM>";
				echo "</center>";

				

				exit();
			}
		?>
		


		<?php
			// Acá, en base al ID recibido, pedimos los datos para MODIFICAR.
			if ($_GET["accion"] == "datos_modificacion")
			{
				include("sql_evento.php");

				
				$conexion = Conectarse();

					if (!$conexion)
					{
						echo "<h1>Error al intentar conectar a BD</h1>";
						
						exit();
					}

				$id = $_GET["txtId"];
				$consulta = "SELECT * FROM eventos_info WHERE codigo_evento = $id";

			

				$resultado = mysqli_query($conexion,$consulta);

				$fila = mysqli_fetch_array($resultado);

				if (!$fila)
				{
					echo "<h1>Registro inexistente</h1>";
				
					exit();
				}

				//cargo los datos del registro en variables para que sea más cómodo trabajar.

                $nameevento = $fila["nombre"];
                $descripcion = $fila["descripcion"];
                $fecha = $fila["fecha"];
                $costo_foto = $fila["costo_foto"];
				$imagen_evento = $fila["imagen"];

				   //liberamos memoria que ocupa la consulta...
				   mysqli_free_result($resultado);

				   //cerramos la conexión con el motor de BD
				   mysqli_close($conexion);

				/*
				ahora que teóricamente tengo los datos del registro que quiero modificar, muestro
				el formulario de carga.
				*/
				echo "<center>";
				echo "<h1><font color=\"blue\">Modificar un Evento</font></h1>";
				echo "<br>";
				echo "<FORM ACTION=\"abm_evento.php\" METHOD=\"GET\">";
				echo "Nombre del Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtnameevento\" VALUE=\"$nameevento\">" . "<BR>";
				echo "Descripcion: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtdescripcion\" VALUE=\"$descripcion\">" . "<BR>";
				echo "Fecha Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtfecha\" VALUE=\"$fecha\">" . "<BR>";
				echo "Costo Foto: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtcosto_foto\" VALUE=\"$costo_foto\">" . "<BR>";
				// Mostrar la ruta de la imagen actual
				echo "Imagen de Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtimagen\" VALUE=\"$imagen_evento\">" . "<BR>";
				echo "<BR>";
				echo "<INPUT TYPE=\"submit\" NAME=\"submit\" value=\"Enviar\">";
				echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_modificacion\">";
				echo "<INPUT TYPE=\"hidden\" NAME=\"codigo_evento\" VALUE=\"$id\">";
				echo "</FORM>";
				echo "</center>";

				
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la modificación.
			if ($_GET["accion"] == "realizar_modificacion")
			{
				include("sql_evento.php");

                $id = $_GET["codigo_evento"];
				$nameevento = $_GET["txtnameevento"];
                $descripcion = $_GET["txtdescripcion"];
                $fecha = $_GET["txtfecha"];
                $costo_foto= $_GET["txtcosto_foto"];
				$imagen_evento= $_GET["txtimagen"];
				modificacion($id, $nameevento,$descripcion,$fecha,$costo_foto,$imagen_evento);
			
			}

		?>
		

		<?php
			// Acá mostramos la pantalla de carga de BAJAS.
			if ($_GET["accion"] == "baja")
			{
            echo"<center>";				
				echo "<h1><font color=\"blue\">Eliminar Evento</font></h1>";
				echo "<br>";
				echo "<FORM ACTION=\"abm_evento.php\" METHOD=\"GET\">";
					echo "Codigo de Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtId\">" . "<BR>";
					echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_baja\">";
				echo "</FORM>";
				echo"</center>";
				
				
				
				exit();
			}
            
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la baja.
			if ($_GET["accion"] == "realizar_baja")
			{
				include("sql_evento.php");
				
				$id = $_GET["txtId"];
				
				baja($id);
				
				
			}
		?>
<form action="administrador_evento.php" method="POST">
<center><input type=submit value=Volver><center>
</form>
		

	</body>
</html>