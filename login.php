<?php
    // Conexión con la base de datos
    if(isset($_POST['btnEnviar'])) {
      $conexion = mysqli_connect('localhost', 'root', '', 'ruquitos');
      $usuario = $_POST['usuario'];
      $password = $_POST['password'];

      // SELECT
      $sql = "SELECT * FROM usuario";
      $result = mysqli_query($conexion, $sql);

      $usuario_registrado = false;
      $password_correcta = false;

      while($mostrar = mysqli_fetch_array($result)){
        if($usuario == $mostrar['usuario']){
          $usuario_registrado = true;
          if($password == $mostrar['password']){
            $password_correcta = true;
          } else {
            $password_correcta = false;
          }
        }
      }

      if($password_correcta){
        header('Location: abmP.php');
      }

      if($usuario_registrado && !$password_correcta){
        ?>
        <script>
          alert("Contraseña incorrecta");
        </script>
        <?php
      }

      if(!$usuario_registrado && !$password_correcta){
        ?>
        <script>
          alert("Usuario no registrado");
        </script>
        <?php
      }
    }
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Inicio de Sesión Administrador</title>
    <link href='' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat|Poppins&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .bg-img {
            background-image: url('images/ciudad1.jpg');
            height: 150vh;
            background-size: cover;
            background-position: center;
        }

        .bg-img::after {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            height: 150%;
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 999;
            width: 370px;
            text-align: center;
            padding: 60px 32px;
            background: rgba(255, 255, 255, 0.04);
            box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);
        }

        .content header {
            color: #fff;
            font-size: 33px;
            font-weight: 600;
            margin: 0 0 35px 0;
            font-family: 'Poppins', sans-serif;
        }

        .field {
            position: relative;
            height: 45px;
            width: 100%;
            display: flex;
            background: rgba(255, 255, 255, 0.94);
        }

        .field span {
            color: #222;
            width: 40px;
            line-height: 45px;
            padding: 0 10px;
        }

        .field input {
            height: 100%;
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            color: #222;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
        }

        .space {
            margin-top: 16px;
        }

        input[type="submit"] {
            background: linear-gradient(to right, #0000ff 0%, #6666ff 100%);
            border: 1px solid linear-gradient(to right, #0000ff 0%, #6666ff 100%);
            color: #fff;
            font-size: 18px;
            letter-spacing: 1px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to left, #0000ff 0%, #6666ff 100%);
        }
    </style>
</head>
<body>

<div class="bg-img">
    <div class="content">
        <header>Inicio Administradoraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</header>
        <form method="POST">
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" required placeholder="Email o Teléfono" name="usuario">
            </div>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <input type="password" class="password" required placeholder="Contraseña" name="password">
            </div>
            <div class="field">
                <input type="submit" value="INGRESAR" name="btnEnviar">
            </div>
            <button type="button" onclick="window.location.href='index.html'">Volver a Inicio</button>
        </form>
    </div>
</div>

</body>
</html>
