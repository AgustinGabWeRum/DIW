<?php

    session_start();

    require 'database.php';
    
    //CUANDO EL USUARIO LE DA A COMPRAR LE VACIAMOS LOS PRODUCTOS QUE TENIA EN LINEACARRITO
    
    $consultaCarrito = "SELECT id_Carrito FROM Carrito WHERE id_Usuario = $idUsuario";
    $resultCarrito = $conn->query($consultaCarrito);

    if($fila = mysqli_fetch_array($resultCarrito)){

        $idCarrito = $fila['id_Carrito'];
        
        $eliminarProductos = "DELETE FROM LineaCarrito WHERE id_Carrito = $idCarrito";
        $resultEliminar = $conn->query($eliminarProductos);
    }
    

    mysqli_close($conn);
?>