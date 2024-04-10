<?php
function Conectarse()
{
    $link = mysqli_connect("localhost", "root", "", "ruquitos");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "<H1>Error en apertura de bases de datos: " . mysqli_connect_error() . "</H1>";
        exit();
    }

    return $link; // Return connection resource upon success
}

$link = Conectarse();

$result = mysqli_query($link, "SELECT * FROM eventos_info");

if (!$result) {
    echo "<H1>Error al ejecutar la consulta.</H1>";
    exit();
}
?>
<html>
<head>
<!-- Basic -->
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/fevicon.png" type="">

  <title> LosRuquitos </title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body bgcolor="#ffb6c1">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid ">
          <div class="contact_nav">
           
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
              <span>
                MYPICTURE
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="eventos.php">Eventos <span class="sr-only">(current)</span></a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="galeria.html">Galeria</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pedidos.html">Pedidos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contactos.html">Contactos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
                </li>

              </ul>
            </div>
          </nav>
        </div>
      
    </header>

  </div>
<H1><center><font face="Georgia" color="blue">REGISTRO DE EVENTOS ACTUALES</font></center> </H1>

<center>
   <TABLE BORDER=5 CELLSPACING=1 CELLPADDING=1 bordercolor=darkblue>
    <TR>
        <TD><b><font color="blue">&nbsp;Codigo Evento&nbsp;</font></b></TD>
        <TD><b><font color="blue">&nbsp;Nombre del Evento&nbsp;</font></b></TD>
        <TD><b><font color="blue">&nbsp;Descripcion&nbsp;</font></b></TD>
        <TD><b><font color="blue">&nbsp;Fecha del Evento&nbsp;</font></b></TD>
        <TD><b><font color="blue">&nbsp;Precio de la Imagen&nbsp;</font></b></TD>
        <TD><b><font color="blue">&nbsp;Imagen Evento&nbsp;</font></b></TD>
    </TR>

<?php
//$row["ID"] NO ES LO MISMO QUE $row["id"] o que $row["Id"]
while ($row = mysqli_fetch_array($result)) {
    echo "<TR>";
    echo "<TD>&nbsp;" . $row["codigo_evento"] . "</TD>";
    echo "<TD>&nbsp;" . $row["nombre"] . "</TD>";
    echo "<TD>&nbsp;" . $row["descripcion"] . "</TD>";
    echo "<TD>&nbsp;" . $row["fecha"] . "</TD>";
    echo "<TD>&nbsp;" . $row["costo_foto"] . "</TD>";
    echo "<TD>&nbsp;" . $row["imagen"] . "</TD>";
    echo "</TR>";
}

//liberamos memoria que ocupa la consulta...
mysqli_free_result($result);

//cerramos la conexión con el motor de BD
mysqli_close($link);
?>

</table>
<center>

    <br>
    <br>
    <TABLE BORDER=0 CELLSPACING=1 CELLPADDING=1 bordercolor=darkblue>
    <TR>
        <TD><a href="abm_evento.php?accion=alta">Agregar</a></TD>
        <TD><a href="abm_evento.php?accion=modificacion">Modificar</a></TD>
        <TD><a href="abm_evento.php?accion=baja">Borrar</a></TD>
    </TR>
     <br>
    
     <br>
    
</body>
</html>

