<html>
<head>
    <?php
    if (isset($_GET["accion"])) {
        if ($_GET["accion"] == "alta")
            echo "<title>" . "Alta de registro" . "</title>";
        elseif ($_GET["accion"] == "baja")
            echo "<title>" . "Baja en la agenda" . "</title>";
        elseif ($_GET["accion"] == "modificacion")
            echo "<title>" . "Modificaci&oacute;n en agenda" . "</title>";
    }
    ?>
</head>

<body bgcolor="#ffb6c1">

<?php
// Acá mostramos la pantalla de carga de ALTAS.
if (isset($_GET["accion"]) && $_GET["accion"] == "alta") {
    echo "<center>";
    echo "<h1><font color=\"blue\">Agregar Evento</font></h1>";
    echo "<br>";
    echo "<FORM ACTION=\"abm_evento.php\" METHOD=\"POST\" enctype=\"multipart/form-data\">";
    echo "Nombre del Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtnameevento\">" . "<BR>";
    echo "<BR>";
    echo "Descripcion del Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtdescripcion\">" . "<BR>";
    echo "<BR>";
    echo "Fecha del Evento:    " . "<INPUT TYPE=\"TEXT\" NAME=\"txtfecha\">" . "<BR>";
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
// Procesamiento del alta después de enviar el formulario
if (isset($_POST["accion"]) && $_POST["accion"] == "realizar_alta") {
    // Verifica si se ha enviado un archivo
    if (isset($_FILES['txtimagen']) && $_FILES['txtimagen']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['txtimagen']['name'];
        $file_tmp = $_FILES['txtimagen']['tmp_name'];
        $ruta = "images/" . $file_name; // Ruta donde se guardará la imagen

        // Mueve el archivo a la ruta especificada
        move_uploaded_file($file_tmp, $ruta);
    } else {
        $ruta = ""; // Establece una cadena vacía si no se cargó ninguna imagen
    }

    include("sql_evento.php");

    $nameevento = $_POST["txtnameevento"];
    $descripcion = $_POST["txtdescripcion"];
    $fecha = $_POST["txtfecha"];
    $costo_foto = $_POST["txtcosto_foto"];

    // Guarda la ruta de la imagen en la base de datos
    alta($nameevento, $descripcion, $fecha, $costo_foto, $ruta);
}
?>

<?php
//Acá solicitamos el ID para poder modificar el registro.
if (isset($_GET["accion"]) && $_GET["accion"] == "modificacion") {
    echo "<center>";
    echo "<h1><font color=\"blue\">Modificar un Evento</font></h1>";
    echo "<br>";
    echo "<FORM ACTION=\"abm_evento.php\" METHOD=\"POST\">";
    echo "Numero de Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtId\">" . "<BR>";
    echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"datos_modificacion\">";
    echo "<INPUT TYPE=\"submit\" VALUE=\"Buscar\">";
    echo "</FORM>";
    echo "</center>";
    exit();
}
?>

<?php
// Acá, en base al ID recibido, pedimos los datos para MODIFICAR.
if (isset($_POST["accion"]) && $_POST["accion"] == "datos_modificacion") {
    include("sql_evento.php");

    $conexion = Conectarse();

    if (!$conexion) {
        echo "<h1>Error al intentar conectar a BD</h1>";
        exit();
    }

    $id = $_POST["txtId"];
    $consulta = "SELECT * FROM eventos_info WHERE codigo_evento = $id";

    $resultado = mysqli_query($conexion, $consulta);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $nameevento = $fila["nombre"];
        $descripcion = $fila["descripcion"];
        $fecha = $fila["fecha"];
        $costo_foto = $fila["costo_foto"];
        $imagen_evento = $fila["imagen"];

        echo "<center>";
        echo "<h1><font color=\"blue\">Modificar un Evento</font></h1>";
        echo "<br>";
        echo "<FORM ACTION=\"abm_evento.php\" METHOD=\"POST\" enctype=\"multipart/form-data\">";
        echo "Nombre del Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtnameevento\" VALUE=\"$nameevento\">" . "<BR>";
        echo "Descripcion: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtdescripcion\" VALUE=\"$descripcion\">" . "<BR>";
        echo "Fecha Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtfecha\" VALUE=\"$fecha\">" . "<BR>";
        echo "Costo Foto: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtcosto_foto\" VALUE=\"$costo_foto\">" . "<BR>";
        echo "Imagen de Evento: " . "<INPUT TYPE=\"file\" NAME=\"txtimagen\"> (Dejar vacío si no se modifica)" . "<BR>";
        echo "<INPUT TYPE=\"hidden\" NAME=\"imagen_actual\" VALUE=\"$imagen_evento\">";
        echo "<BR>";
        echo "<INPUT TYPE=\"submit\" NAME=\"submit\" value=\"Enviar\">";
        echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_modificacion\">";
        echo "<INPUT TYPE=\"hidden\" NAME=\"codigo_evento\" VALUE=\"$id\">";
        echo "</FORM>";
        echo "</center>";
    } else {
        echo "<h1>Registro inexistente</h1>";
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
?>

<?php
// Procesamiento de la modificación después de enviar el formulario
if (isset($_POST["accion"]) && $_POST["accion"] == "realizar_modificacion") {
    include("sql_evento.php");

    $id = $_POST["codigo_evento"];
    $nameevento = $_POST["txtnameevento"];
    $descripcion = $_POST["txtdescripcion"];
    $fecha = $_POST["txtfecha"];
    $costo_foto = $_POST["txtcosto_foto"];
    $imagen_actual = $_POST["imagen_actual"];

    // Verificar si se cargó una nueva imagen
    if (isset($_FILES['txtimagen']) && $_FILES['txtimagen']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['txtimagen']['name'];
        $file_tmp = $_FILES['txtimagen']['tmp_name'];
        $ruta = "images/" . $file_name;

        // Mueve el archivo a la ruta especificada
        move_uploaded_file($file_tmp, $ruta);
    } else {
        $ruta = $imagen_actual; // Mantener la imagen actual si no se cargó una nueva
    }

    modificacion($id, $nameevento, $descripcion, $fecha, $costo_foto, $ruta);
}
?>

<?php
// Acá, en base al ID recibido, hacemos la baja.
if (isset($_GET["accion"]) && $_GET["accion"] == "baja") {
    echo "<center>";
    echo "<h1><font color=\"blue\">Borrar Evento</font></h1>";
    echo "<br>";
    echo "<FORM ACTION=\"abm_evento.php\" METHOD=\"POST\">";
    echo "Número de Evento: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtId\">" . "<BR>";
    echo "<BR>";
    echo "<INPUT TYPE=\"submit\" NAME=\"accion\" VALUE=\"Borrar\">";
    echo "</FORM>";
    echo "</center>";
    exit();
}
?>

<?php
include("sql_evento.php");
// Acá, en base al ID recibido, hacemos la baja.
if (isset($_POST["accion"]) && $_POST["accion"] == "Borrar") {
    // Verifica si se ha enviado un ID para la baja
    if (isset($_POST["txtId"])) {
        $id = $_POST["txtId"];
        baja($id); // Llama a la función baja con el ID del evento a eliminar
    } else {
        echo "No se ha especificado un ID para realizar la baja.";
    }
}
?>

<form action="administrador_evento.php" method="POST">
    <center><input type="submit" value="Volver"></center>
</form>

</body>
</html>