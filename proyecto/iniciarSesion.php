<?php
session_start();
?>
<?php

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
            
            if(mysqli_num_rows($resultadoComprobacion) == 0){

                $sql = "INSERT INTO Carrito (id_Usuario) VALUES ('$idUsuario')";
                $result = $conn->query($sql);
                
            }else{
                //no hacer nada
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
