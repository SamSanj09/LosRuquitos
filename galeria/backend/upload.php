<?php
include('databaseconnection.php');

if (isset($_POST['Guardar'])) {
    # code...
    $imagen = $_FILES['imagen']['name'];
    $nombre = $_POST['tiulo'];
    if (isset($imagen) && $imagen!="") {
        # code...
        $tipo = $_FILES['imagen']['type'];
        $temp = $_FILES['imagen']['tmp_name'];
        if (!(strpos($tipo,'jpg' || strpos($tipo,'png') || strpos($tipo,'gif' ) || strpos($tipo,'jpeg')))) {
            $_SESSION['mensaje'] =' Solo se permiten archivos de imagen ! ';
            header('location:../index.php');
            # code...
        }else{
            $query = "INSERT INTO imagenes (imagen,nombre)  VALUES ('$imagen' , '$nombre' )";

            $resultado = $conn->query($query);
            if ($resultado) {
                # code...
                move_uploaded_file($temp,'imagenes/'.$imagen);
                $_SESSION['mensaje'] = 'Se ha subido correctamente ';
            }else{
                $_SESSION['mensaje'] = 'No se ha subido correctamente ';
            }

        }
    }
    
}

?>