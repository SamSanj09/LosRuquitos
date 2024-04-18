<?php
	function Conectarse()
	{//inttroducimos los datos de  host que son "Server", "usuario" y "contraseña" 
		if (!($link=mysqli_connect("localhost","root","")))//aca hay que introducir los datos que especifique arriba!!!
		{
			return 0;
		}
		if (!mysqli_select_db($link,"Fotos"))
		{
			return 0;
		}
		return $link;
	}

	//--------------------------

	function alta ($nombre,$apellido,$email,$cantidad, $precio)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "INSERT INTO alumnos (nombre, apellido, email,cantidad, precio) VALUES ('$nombre', '$apellido','$email','$cantidad','$precio')";

		


		echo $consulta;

		$resultado=mysqli_query($consulta,$conexion);

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
		$consulta = "DELETE FROM pedidos WHERE codpedido = $id";

		echo $consulta . "<BR>";

		$resultado=mysqli_query($consulta,$conexion);

		//echo "Resultado de la operaci&oacute;n: " . $resultado;

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);

	}

	//--------------------------

	function modificacion ($id, $nombre,$apellido,$email,$cantidad,$precio)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}


		$consulta = "UPDATE pedido SET nombre='$nombre',apellido='$apellido',email='$email',cantidad='$cantidad', precio='$precio'";
                $consulta = $consulta . "WHERE codpedido='$id'";


		echo $consulta;

		$resultado=mysqli_query($consulta,$conexion);

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);
	}

?>
<?php
include("sql.php"); // Incluye el archivo que contiene las funciones de base de datos

// Recibe los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

// Llama a la función "alta" para agregar los datos a la base de datos
alta($nombre, $apellido, $email, $cantidad, $precio);
?>