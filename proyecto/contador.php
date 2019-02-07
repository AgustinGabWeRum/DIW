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

    $idProducto = $_POST['idProducto'];
    $idUsuario = $_SESSION['idUsuario'];
    $fecha_actual = date('Y-m-d');

    $consultaCarrito = "SELECT id_Carrito FROM Carrito WHERE id_Usuario = '$idUsuario'";

    $resultadoID_Carrito = $conn->query($consultaCarrito);

    if($fila=mysqli_fetch_array($resultadoID_Carrito)){
        $idCarrito = $fila["id_Carrito"];

        $insertarCarrito = "INSERT INTO LineaCarrito VALUES ( NULL, '$idProducto', '$idCarrito', '$fecha_actual')";

        if (mysqli_query($conn, $insertarCarrito)) {
      
            echo "insertado correctamente";
          
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>