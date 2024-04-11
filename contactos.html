<?php
// Datos de conexión a la base de datos MySQL
$servername = "localhost"; // Si MySQL está en el mismo servidor que el script PHP
$username = "root"; // Nombre de usuario de MySQL
$password = ""; // Contraseña de MySQL (generalmente vacía por defecto en XAMPP)
$database = "ruquitos"; // Nombre de la base de datos
$table = "contactos"; // Nombre de la tabla

// Establecer conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} 

// Recuperar datos del formulario solo si se han enviado
if(isset($_POST['nombre'], $_POST['celular'], $_POST['correo'], $_POST['dmensaje'])) {
    $nombre = $_POST['nombre'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $dmensaje = $_POST['dmensaje'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO contactos(nombre, celular, correo, dmensaje) VALUES ('$nombre', '$celular', '$correo', '$dmensaje')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Los datos se han insertado correctamente.");</script>';
    } else {
        echo '<script>alert("Error al insertar los datos.");</script>';
    }
}

// Consulta para obtener todos los pedidos registrados
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

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
                  <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="eventos.html">Eventos</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="galeria.html">Galeria</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pedidos.php">Pedidos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contactos.php">Contactos <span class="sr-only">(current)</span></a>
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
 <section class="contact_section layout_padding-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-md-1">
          <div class="heading_container">
            <h2>
              Contactanos Inmediatamente
            </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-md-1">
          <div class="form_container">
            <form action="contactos.php" method="post">
              <div>
                <input type="text" placeholder="Nombre Inicial..." name="nombre"/>
              </div>
              <div>
                <input type="text" placeholder="Numero telefonico..." name="celular"/>
              </div>
              <div>
                <input type="email" placeholder="Correo..."  name="correo"/>
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Descripcion..." name="dmensaje"/>
              </div>
              <div class="btn_box">
                <button type="submit"> <!-- Cambiado 'button' a 'submit' para enviar el formulario -->
                    SEND
                </button>
            </div>
            </form>
          </div>
        </div>
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Agregar una sección para mostrar la lista de pedidos -->
  <section class="contact_section layout_padding-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading_container">
            <h2>Listado de Pedidos</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Celular</th>
                  <th>Correo</th>
                  <th>Mensaje</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Mostrar los datos de los pedidos en la tabla
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["nombre"]."</td>";
                        echo "<td>".$row["celular"]."</td>";
                        echo "<td>".$row["correo"]."</td>";
                        echo "<td>".$row["dmensaje"]."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay pedidos registrados.</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Direccion
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Ubication 
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Llama 73596367
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  fotosLPCity@gmail.com
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
              Informacion
            </h4>
            <p>
              Hacemos un momento feliz para ti y tu familia, capturamos
              tu momento inolvidable con fotos bastantes especiales para ti
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          
        </div>

      </div>
    </div>
  </section>

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  </script>
  <!-- End Google Map -->

</body>
</html>

<?php
// Cerrar conexión a la base de datos
$conn->close();
?>
