<?php

    session_start();

    require 'database.php';
    
    //COMPROBAMOS EL USUARIO Y CONTRASEÑA CORRESPONDIENTE

    $usuario = $_POST['usuario'];
    $password = $_POST['contrasenya'];
    $encriptado=md5($password);
    $consulta = "SELECT * FROM Usuarios WHERE usuario = '$usuario' AND contrasenya = '$encriptado'";
    
    $result = $conn->query($consulta);

    if ($result->num_rows >= 1) {

        if ($fila = mysqli_fetch_array($result)) {
            
            $_SESSION['loggedin'] = true;
            $_SESSION['idUsuario'] = $fila['id_Usuario'];
            $_SESSION['usuario'] = $usuario;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

            $idUsuario = $_SESSION['idUsuario'];

            $comprobacion = "SELECT id_Usuario FROM Carrito WHERE id_Usuario ='$idUsuario'";
            
            $resultadoComprobacion = $conn->query($comprobacion);
            
            //LE INSERTAMOS AL USUARIO UN CARRITO POR DEFECTO LA PRIMERA VEZ QUE INICIE SESION CON SU CUENTA
            
            if(mysqli_num_rows($resultadoComprobacion) == 0){

                $sql = "INSERT INTO Carrito (id_Usuario) VALUES ('$idUsuario')";
                $result = $conn->query($sql);
                
            }
            header("Location: index.php");
            exit;   
        }
    }
    else{
        header("Location: formularioIniciarSesion.php");
    }
    
    mysqli_close($conn);
?>
