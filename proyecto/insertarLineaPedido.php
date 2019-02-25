<?php

    session_start();

    require 'database.php';

    //CUANDO EL USUARIO LE DE A COMPRAR INSERTAMOS LOS PRODUCTOS EN LINEAPEDIDOS(FACTURA)
    
    $idUsuario = $_SESSION['idUsuario'];
    
    $consultaCarrito = "SELECT id_Carrito FROM Carrito WHERE id_Usuario=$idUsuario";
    $resultCarrito = $conn->query($consultaCarrito);
    
    if($fila=mysqli_fetch_array($resultCarrito)){

        $idCarrito = $fila['id_Carrito'];

        $consultaPedido = "SELECT * FROM Pedidos WHERE id_Usuario=$idUsuario ORDER BY id_Pedido DESC LIMIT 1;";
        $resultPedido = $conn->query($consultaPedido);
        
        if($filaPedido=mysqli_fetch_array($resultPedido)){

            $idPedido = $filaPedido['id_Pedido'];

            $consultaIdProducto = "SELECT id_Producto FROM LineaCarrito WHERE id_Carrito=$idCarrito";
            $resultProducto = $conn->query($consultaIdProducto);

            while($filaProductos=mysqli_fetch_array($resultProducto)){

                $idProducto = $filaProductos['id_Producto'];

                $insertar = "INSERT INTO LineaPedidos VALUES (NULL, '$idPedido', '$idProducto')";

                $resultInsertar = $conn->query($insertar);

            }

        }

    }

    mysqli_close($conn);
?>