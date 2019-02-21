<?php

  session_start();
  //Comprobamos sesión
  if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $idUsuario=$_SESSION['idUsuario'];
  }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />

<head>

  <title>ZAPASHOP</title>
  <link rel="stylesheet" href="css/pruebabootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="shortcut icon" href="img/favicon.png" />
  <script src="js/javascript.js"></script>

</head>

<body>
  <div ondrop="drop(event)" id="carrito">
      <button><img id="imagenCarrito" src="img/carrito.png"></button>
      <div id="contadorPadre">

      </div>
      <div id="carritoPadre">
        
      </div>  
  </div>
  <h1 id="titulo"><a id="enlace" href="index.php">ZAPASHOP</a>
    <a href="index.php"><img id="logo" src="img/nikeLogo.png"></a>
    <?php if(isset($usuario)) { ?>
        <span id="identidad"><a href="datosPersonales.php" class="iniciarSesion">Hola, <?php echo $usuario; ?></a></span>
        <a href="cerrarSesion.php" class="letraInicio" class="iniciarSesion">Cerrar Sesión</a>

    <?php } else { ?>
        <span class="iniciarSesion" id="identidad">¿Quién eres?  </span>
        <a href="formularioIniciarSesion.php" class="letraInicio" class="iniciarSesion">Iniciar Sesión</a>
    <?php } ?>
    
  </h1>