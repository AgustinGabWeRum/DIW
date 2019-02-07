<?php

    session_start();

    $servername = "localhost:3306";
    $database = "Zapashop";
    $username = "daw";
    $password = "daw";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
     
    echo "Connected successfully";

    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contrasenya = $_POST['password'];
    $encriptar = md5($contrasenya);

    $consulta = "SELECT usuario FROM Usuarios";

    $resultadoConsulta = $conn->query($consulta);

    if($resultadoConsulta->num_rows >= 1){

      $sql = "INSERT INTO Usuarios (nombre, usuario, contrasenya) VALUES ('$nombre','$usuario' , '$encriptar' )";
      $result = $conn->query($sql);
      
      header ("Location: formularioIniciarSesion.php");

    }else{
      header ("Location: formularioRegistro.php");
    }
    
    mysqli_close($conn);
?>