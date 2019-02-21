<?php

    require 'database.php';

    //INSERTAMOS EN LA BASE DE DATOS LAS CARACTERISTICAS DEL USUARIO PARA PODER POSTERIORMENTE LOGUEARSE CON SU USUARIO Y CONTRASEÑA
    
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contrasenya = $_POST['password'];
    $encriptar = md5($contrasenya);

    $consulta = "SELECT * FROM Usuarios WHERE usuario = $usuario";

    $result = $conn->query($consulta);

    if($result->num_rows >= 1){

      header ("Location: formularioRegistro.php");  
    }
    else{
      $sql = "INSERT INTO Usuarios (id_Usuario, nombre, usuario, contrasenya) VALUES ( NULL,'$nombre','$usuario' , '$encriptar' )";
      $result = $conn->query($sql);
      
      header ("Location: formularioIniciarSesion.php");
    }
    
    mysqli_close($conn);
?>