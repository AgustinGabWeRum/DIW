<?php

    session_start();

    require 'database.php';

    //SELECCIONAMOS EL IDCARRITO DEL USUARIO Y LO INSERTAMOS EN LINEACARRITO CON LOS PRODUCTOS CORRESPONDIENTES
    
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

        include 'desplegableCarrito.php';

}
    mysqli_close($conn);
?>