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

    $idProducto = $_POST['idProducto'];
    $idUsuario = $_SESSION['idUsuario'];
    $fecha_actual = date('Y-m-d');

    //SELECCIONAR TODOS LOS IDCARRITOS DEL USUARIO LOGUEADO

    $consultaCarrito = "SELECT id_Carrito FROM Carrito WHERE id_Usuario = '$idUsuario'";

    $resultadoID_Carrito = $conn->query($consultaCarrito);

    if($fila=mysqli_fetch_array($resultadoID_Carrito)){

        //COGER CADA CARRITO E INSERTARLO EN LINEACARRITO CON SU RESPECTIVO USUARIO

        $idCarrito = $fila["id_Carrito"];

        $insertarCarrito = "INSERT INTO LineaCarrito VALUES ( NULL, '$idProducto', '$idCarrito', '$fecha_actual')";

        //INSERTAR CARRITO

        $result = mysqli_query($conn, $insertarCarrito);

}
    mysqli_close($conn);
?>