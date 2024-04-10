<?php
function Conectarse()
{
    $link = mysqli_connect("localhost", "root", "", "ruquitos");

    // Verificar conexión
    if (mysqli_connect_errno()) {
        echo "<H1>Error en apertura de bases de datos: " . mysqli_connect_error() . "</H1>";
        exit();
    }

    return $link; // Devolver conexión exitosa
}

// Establecer conexión
$link = Conectarse();

// Consulta a la base de datos
$result = mysqli_query($link, "SELECT * FROM eventos_info");

if (!$result) {
    echo "<H1>Error al ejecutar la consulta.</H1>";
    exit();
}
?>

<!DOCTYPE html>
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

<body>

  <div class="hero_area">
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
      </div>
    </header>
    <div class="container">
  <div class="row">
    <?php
    $count = 0; // Contador para controlar el número de eventos por fila
    while ($fila = mysqli_fetch_array($result)) {
      // Obtener datos de la fila
      $nombre = $fila['nombre'];
      $descripcion = $fila['descripcion'];
      $fecha = $fila['fecha'];
      // Verificar si la clave 'costo' está definida antes de acceder a ella
      $costo = isset($fila['costo_foto']) ? $fila['costo_foto'] : "No especificado";
      // La columna 'imagen' contiene la ruta a la imagen en la base de datos, aquí debes adaptarla según tu estructura de base de datos
      $imagen = $fila['imagen'];

      // Mostrar la información en forma de panel
      echo '<div class="col-md-3">';
      echo '<div class="card">';
      echo '<img src="' . $imagen . '" class="card-img-top" alt="Imagen del evento">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">' . $nombre . '</h5>';
      echo '<p class="card-text">' . $descripcion . '</p>';
      echo '<p class="card-text">Fecha: ' . $fecha . '</p>';
      echo '<p class="card-text">Costo: ' . $costo . '</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';

      $count++;

      // Si se han mostrado 4 eventos, cerrar la fila actual y abrir una nueva
      if ($count % 4 == 0) {
        echo '</div>'; // Cierra la fila actual
        echo '<div class="row">'; // Abre una nueva fila
      }
    }

    // Verificar si se necesita cerrar la última fila
    if ($count % 4 != 0) {
      echo '</div>'; // Cierra la última fila si no está completa
    }
    ?>
  </div>
</div>

    Aqui


  <button onclick="window.location.href = 'administrador_evento.php';">Ir a archivo PHP</button>
    <!-- end slider section -->
  </div>



  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          
        </div>

      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
        Distributed By
        <a href="https://themewagon.com">ThemeWagon</a>
      </p>
    </div>
  </section>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>