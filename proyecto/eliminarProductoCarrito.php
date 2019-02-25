<?php

    require 'database.php';
    
    //SELECCIONAMOS EL IDCARRITO DEL USUARIO PARA POSTERIORMENTE ELIMINARLO(PRODUCTO COMPRADO, CARRITO ELIMINADO)
    
    $idLineaCarrito = $_POST['idLineaCarrito'];
    
    $eliminar = "DELETE FROM LineaCarrito WHERE id_LineaCarrito = $idLineaCarrito";

    $result = $conn->query($eliminar);

    mysqli_close($conn);
?>