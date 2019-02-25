<?php

    session_start();

    require 'database.php';

    //CUANDO EL USUARIO LE DE A COMPRAR INSERTAMOS EL USUARIO Y EL TOTAL DE LA COMPRA EN PEDIDOS

    $idUsuario = $_SESSION['idUsuario'];
    $total = $_POST["total"];

    $insertarPedido = "INSERT INTO Pedidos VALUES (NULL, '$idUsuario', '$total')";
    $result = $conn->query($insertarPedido);

    //INSERTA PEDIDOS EN LINEAPEDIDOS(FACTURA)
    include 'insertarLineaPedido.php';

    //ELIMINA LOS PRODUCTOS DE LINEACARRITO
    include 'comprarProductos.php';

    mysqli_close($conn);
?>