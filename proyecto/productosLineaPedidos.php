<?php

    include 'header.php';

    require_once 'database.php';

    $idPedido = $_GET['idpedido'];

?>
    <div id='aumentarDiv'>
        <div id='cabecera'>
            <h3 style='text-align:center; color: white;'>TU CUENTA PARA TODO LO</h3>
            <h3 style='text-align:center; color: white;'> RELACIONADO CON NIKE</h3>
        </div>
<?php

    $productos = "SELECT * FROM LineaPedidos WHERE id_Pedido = $idPedido";
    $result = $conn->query($productos);

    while($fila = mysqli_fetch_array($result)){

        $idProducto = $fila['id_Producto'];

        $consulta = "SELECT * FROM Productos WHERE id_Producto = $idProducto";
        $resultConsulta = $conn->query($consulta);

        while($producto = mysqli_fetch_array($resultConsulta)){

            $imagen = $producto['imagenes'];
            $nombre = $producto['nombre'];
            $precio = $producto['precio'];
        ?>

        <div class="detallesPedido">

            <div class="imagenDetalle"><img src='<?php echo $imagen; ?>'></div>
            <div class="nombreDetalle"><h3><?php echo $nombre; ?></h3></div>
            <div class="precioDetalle"><h3><b><?php echo $precio; ?> €</b></h3></div>

        </div>
        <?php
    }
}
?>
    </div>
<?php
    mysqli_close($conn);
?>