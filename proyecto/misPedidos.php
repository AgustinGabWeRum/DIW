<?php

    include 'header.php';

    session_start();

    require 'database.php';

    //HACEMOS UNA INTERFAZ CON SUS RESPECTIVOS DIVS
?>
    <div class='contenedor'>
        <div id='cabecera'>
            <h3 style='text-align:center; color: white;'>TU CUENTA PARA TODO LO</h3>
            <h3 style='text-align:center; color: white;'> RELACIONADO CON NIKE</h3>
        </div>
        <div id='camposBD'>
            <div class='factura'>Pedido nº</div>
            <div class='factura'>Cantidad Productos</div>
            <div class='factura'>Precio Total</div>
        </div>

<?php

    $idUsuario = $_SESSION['idUsuario'];
    
    $consultaIdPedido = "SELECT * FROM Pedidos WHERE id_Usuario=$idUsuario";
    $result = $conn->query($consultaIdPedido);

    //IMPRIMIMOS LA FACTURA CON EL NUMERO DE PEDIDO, EL TOTAL DE LA COMPRA Y LA CANTIDAD DE PRODUCTOS COMPRADOS
    
    while($fila=mysqli_fetch_array($result)){

        $idPedido = $fila['id_Pedido'];
        $total = $fila['total'];

        $cantidad = "SELECT COUNT(id_Pedido) FROM LineaPedidos WHERE id_Pedido=$idPedido";
        $resultCount = $conn->query($cantidad);

        if($filaCount=mysqli_fetch_array($resultCount)){

            $count = $filaCount['COUNT(id_Pedido)'];
            ?> 
            <div class='pedidos'>
                <div class='id_Pedido'>
                    <a id="pedido_<?php echo $idPedido; ?>" class="enlacePedido" href="productosLineaPedidos.php?idpedido=<?php echo $idPedido; ?>">
                        <?php echo $idPedido; ?>
                    </a>
                </div>
                <div class='cantidad'><?php echo $count; ?></div>
                <div class='total'><?php echo $total ?> €</div>
            </div>
    <?php    
        }
    }
    ?>

    </div>
<?php
    mysqli_close($conn);
?>